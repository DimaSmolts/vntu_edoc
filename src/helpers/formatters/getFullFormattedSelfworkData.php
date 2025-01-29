<?php

require_once __DIR__ . '/../../models/SelfworkModel.php';
require_once __DIR__ . '/../../models/SemesterEducationalFormModel.php';
require_once __DIR__ . '/../../models/TaskModel.php';
require_once __DIR__ . '/../../models/EducationalFormTaskHourModel.php';
require_once __DIR__ . '/getLessonWithEducationalFormLessonHour.php';
require_once __DIR__ . '/../getHoursSumForEducationalForms.php';
require_once __DIR__ . '/../getIsTypeOfWorkExists.php';
require_once __DIR__ . '/../getTaskId.php';
require_once __DIR__ . '/../getCourseTask.php';
require_once __DIR__ . '/../getCalculationAndGraphicTypeTask.php';
require_once __DIR__ . '/../getModulesTasks.php';
require_once __DIR__ . '/../getLessonTypeIdByName.php';
require_once __DIR__ . '/../getLessonSelfworkByLessonTypeId.php';

use App\Models\SemesterEducationalFormModel;
use App\Models\TaskModel;
use App\Models\SelfworkModel;
use App\Models\EducationalFormTaskHourModel;

function getFullFormattedSelfworkData($workingProgramData)
{
	$tasksIds = getTaskId();

	// Обробляємо семестри робочої програми
	return $workingProgramData->semesters->map(function ($semester) use (&$workingProgramData, &$tasksIds) {
		$lectionsWithEducationalFormLessonHour = [];
		$practicalsAmount = 0;
		$seminarsAmount = 0;
		$labsAmount = 0;
		$semesterEducationalForms = [];
		$colloquiumAmount = 0;
		$controlWorkAmount = 0;
		$modulesTasksInSemester = [];

		// Обробляємо всі обрані форми навчання для даного семестру та трансформуємо їх у модель
		$semesterEducationalForms[] = $semester->educationalForms->map(function ($educationalForm) {
			return new SemesterEducationalFormModel(
				$educationalForm->id,
				$educationalForm->educationalDisciplineSemesterId,
				$educationalForm->educationalFormId,
				$educationalForm->educationalForm->name,
				getEducationalFormVisualName($educationalForm->educationalForm->name)
			);
		})->toArray();

		// Обробляємо всі теми самостійних
		$selfworks = getLessonWithEducationalFormLessonHour($semester->selfworks);

		// Обробляємо модулі семестра
		$semester->modules->map(function ($module) use (
			&$lectionsWithEducationalFormLessonHour,
			&$practicalsAmount,
			&$seminarsAmount,
			&$labsAmount,
			&$colloquiumAmount,
			&$controlWorkAmount,
			&$tasksIds,
			&$modulesTasksInSemester,
			&$semester,
		) {
			// Збираємо кількість колоквіумів та контрольних робіт
			$isColloquiumExists = getIsTypeOfWorkExistsInModule($module, $tasksIds->colloquium);
			$isControlWorkExists = getIsTypeOfWorkExistsInModule($module, $tasksIds->controlWork);

			if ($isColloquiumExists) {
				$colloquiumAmount += 1;
			}

			if ($isControlWorkExists) {
				$controlWorkAmount += 1;
			}

			// Обробляємо теми модуля
			$module->themes->map(function ($theme) use (
				&$lectionsWithEducationalFormLessonHour,
			) {
				$lection = getLessonWithEducationalFormLessonHour($theme->lections);
				$lectionsWithEducationalFormLessonHour = array_merge($lectionsWithEducationalFormLessonHour, $lection);
			});

			$practicalsAmount += count($module->practicals);
			$seminarsAmount += count($module->seminars);
			$labsAmount += count($module->labs);

			$rawModulesTasks = getModulesTasks($module, $semester);

			$modulesTasksInSemester = array_merge($modulesTasksInSemester, $rawModulesTasks);
		});

		// Поєднуємо всі навчальні форми в один масив
		$mergedSemesterEducationalForms = array_merge(...$semesterEducationalForms);

		// Видаляємо дублікати
		$uniqueSemesterEducationalForms = array_values(array_reduce(
			$mergedSemesterEducationalForms,
			function ($carry, $item) {
				$carry[$item->educationalFormId] = $item;
				return $carry;
			},
			[]
		));

		// Рахуємо всі години лекцій для різних форм навчання
		$totalHoursForLections = getHoursSumForEducationalForms($lectionsWithEducationalFormLessonHour, $uniqueSemesterEducationalForms);

		// Обробляємо всі додаткові завдання
		$additionalTasks = $semester->additionalTasks->map(function ($additionalTask) use (&$semester) {
			$educationalFormHours = isset($additionalTask->educationalFormTaskHours)
				? $additionalTask->educationalFormTaskHours->map(function ($taskHours) {
					return new EducationalFormTaskHourModel(
						$taskHours->semesterEducationalForm->id,
						$taskHours->semesterEducationalForm->educationalForm->name,
						$taskHours->hours
					);
				})->toArray()
				: [];

			return new TaskModel(
				$semester->id,
				$additionalTask->taskTypeId,
				$additionalTask->id,
				$additionalTask->taskType->name,
				$educationalFormHours,
				$additionalTask->points ?? null,
			);
		})->toArray();

		// Дістаємо курсову роботу або проєкт 
		$rawCourseTask = getCourseTask($semester);
		$educationalFormCourseTaskHours = isset($rawCourseTask->educationalFormTaskHours)
			? $rawCourseTask->educationalFormTaskHours->map(function ($courseTaskHours) {
				return new EducationalFormTaskHourModel(
					$courseTaskHours->semesterEducationalForm->id,
					$courseTaskHours->semesterEducationalForm->educationalForm->name,
					$courseTaskHours->hours
				);
			})->toArray()
			: [];

		$courseTask = isset($rawCourseTask) ?
			new TaskModel(
				$semester->id,
				$rawCourseTask->taskTypeId,
				$rawCourseTask->id,
				$rawCourseTask->taskType->name,
				$educationalFormCourseTaskHours,
				$rawCourseTask->points ?? null,
			) : null;

		// Дістаємо РГР або РГЗ 
		$rawCalculationAndGraphicTypeTask = getCalculationAndGraphicTypeTask($semester);

		$educationalFormCourseTaskHours = isset($rawCalculationAndGraphicTypeTask->educationalFormTaskHours)
			? $rawCalculationAndGraphicTypeTask->educationalFormTaskHours->map(function ($courseTaskHours) {
				return new EducationalFormTaskHourModel(
					$courseTaskHours->semesterEducationalForm->id,
					$courseTaskHours->semesterEducationalForm->educationalForm->name,
					$courseTaskHours->hours
				);
			})->toArray()
			: [];

		$calculationAndGraphicTypeTask = isset($rawCalculationAndGraphicTypeTask) ?
			new TaskModel(
				$semester->id,
				$rawCalculationAndGraphicTypeTask->taskTypeId,
				$rawCalculationAndGraphicTypeTask->id,
				$rawCalculationAndGraphicTypeTask->taskType->name,
				$educationalFormCourseTaskHours,
				$rawCalculationAndGraphicTypeTask->points ?? null
			) : null;

		$lessonTypesIds = getLessonTypeIdByName();

		$rawLections = getLessonSelfworkByLessonTypeId($semester, $lessonTypesIds->lection);

		$educationalFormLectionSelfworkHours = count($rawLections) > 0
			? $rawLections->map(function ($rawLection) {
				return isset($rawLection)
					? new EducationalFormTaskHourModel(
						$rawLection->semesterEducationalForm->id,
						$rawLection->semesterEducationalForm->educationalForm->name,
						$rawLection->hours
					)
					: null;
			})->toArray()
			: [];

		$lectionSelfworkTask = count($rawLections) > 0
			? new TaskModel(
				$semester->id,
				$rawLections->first()->lessonTypeId,
				$rawLections->first()->id,
				'lections',
				$educationalFormLectionSelfworkHours,
				$rawLections->first()->points ?? null
			)
			: null;

		$rawLabs = getLessonSelfworkByLessonTypeId($semester, $lessonTypesIds->laboratory);

		$educationalFormLabSelfworkHours = count($rawLabs) > 0
			? $rawLabs->map(function ($rawLab) {
				return isset($rawLab)
					? new EducationalFormTaskHourModel(
						$rawLab->semesterEducationalForm->id,
						$rawLab->semesterEducationalForm->educationalForm->name,
						$rawLab->hours
					)
					: null;
			})->toArray()
			: [];

		$labSelfworkTask = count($rawLabs) > 0
			? new TaskModel(
				$semester->id,
				$rawLabs->first()->lessonTypeId,
				$rawLabs->first()->id,
				'practicals',
				$educationalFormLabSelfworkHours,
				$rawLabs->first()->points ?? null
			)
			: null;

		$rawPracticals = getLessonSelfworkByLessonTypeId($semester, $lessonTypesIds->practical);

		$educationalFormPracticalSelfworkHours = count($rawPracticals) > 0
			? $rawPracticals->map(function ($rawPractical) {
				return isset($rawPractical)
					? new EducationalFormTaskHourModel(
						$rawPractical->semesterEducationalForm->id,
						$rawPractical->semesterEducationalForm->educationalForm->name,
						$rawPractical->hours
					)
					: null;
			})->toArray()
			: [];

		$practicalSelfworkTask = count($rawPracticals) > 0
			? new TaskModel(
				$semester->id,
				$rawPracticals->first()->lessonTypeId,
				$rawPracticals->first()->id,
				'practicals',
				$educationalFormPracticalSelfworkHours,
				$rawPracticals->first()->points ?? null
			)
			: null;

		$rawSeminars = getLessonSelfworkByLessonTypeId($semester, $lessonTypesIds->seminar);

		$educationalFormSeminarSelfworkHours = count($rawSeminars) > 0
			? $rawSeminars->map(function ($rawSeminar) {
				return isset($rawSeminar)
					? new EducationalFormTaskHourModel(
						$rawSeminar->semesterEducationalForm->id,
						$rawSeminar->semesterEducationalForm->educationalForm->name,
						$rawSeminar->hours
					)
					: null;
			})->toArray()
			: [];

		$seminarSelfworkTask = count($rawSeminars) > 0
			? new TaskModel(
				$semester->id,
				$rawSeminars->first()->lessonTypeId,
				$rawSeminars->first()->id,
				'practicals',
				$educationalFormSeminarSelfworkHours,
				$rawSeminars->first()->points ?? null
			)
			: null;

		$moduleTask = isset($modulesTasksInSemester[0]) ? $modulesTasksInSemester[0] : null;

		return new SelfworkModel(
			$semester->id,
			$totalHoursForLections,
			$practicalsAmount,
			$seminarsAmount,
			$labsAmount,
			$uniqueSemesterEducationalForms,
			getIsTypeOfWorkExistsInSemester($semester, $tasksIds->coursework),
			getIsTypeOfWorkExistsInSemester($semester, $tasksIds->courseProject),
			getIsTypeOfWorkExistsInSemester($semester, $tasksIds->calculationAndGraphicWork),
			getIsTypeOfWorkExistsInSemester($semester, $tasksIds->calculationAndGraphicTask),
			$additionalTasks,
			$colloquiumAmount,
			$controlWorkAmount,
			$semester->semesterNumber,
			isset($semester->examType) ? $semester->examType->id : null,
			isset($semester->examType) ? $semester->examType->e_name : '',
			$workingProgramData->creditsAmount,
			$courseTask,
			$calculationAndGraphicTypeTask,
			$moduleTask,
			$lectionSelfworkTask,
			$labSelfworkTask,
			$practicalSelfworkTask,
			$seminarSelfworkTask,
			$selfworks
		);
	})->toArray();
}
