<?php

require_once __DIR__ . '/../../models/WPDetailsModel.php';
require_once __DIR__ . '/../../models/PDFSemesterModel.php';
require_once __DIR__ . '/../../models/PDFModuleModel.php';
require_once __DIR__ . '/../../models/PDFThemeWithLessonsModel.php';
require_once __DIR__ . '/../../models/WPInvolvedPersonModel.php';
require_once __DIR__ . '/../../models/SemesterEducationalFormModel.php';
require_once __DIR__ . '/../../models/WorkingProgramLiteratureModel.php';
require_once __DIR__ . '/../../models/EducationalFormCourseworkHourModel.php';
require_once __DIR__ . '/../getEducationalFormVisualName.php';
require_once __DIR__ . '/../getHoursSumForEducationalForms.php';
require_once __DIR__ . '/../getAllEducationalFormsAvailableInWorkingProgram.php';
require_once __DIR__ . '/getLessonWithEducationalFormLessonHour.php';
require_once __DIR__ . '/getEducationalFormHoursStructureForTheme.php';

use App\Models\WPDetailsModel;
use App\Models\PDFSemesterModel;
use App\Models\PDFModuleModel;
use App\Models\PDFThemeWithLessonsModel;
use App\Models\WPInvolvedPersonModel;
use App\Models\SemesterEducationalFormModel;
use App\Models\WorkingProgramLiteratureModel;
use App\Models\EducationalFormCourseworkHourModel;

function getFullFormattedWorkingProgramDataForPDF($workingProgramData)
{
	// Створюємо модель загальних даних для робочої програми
	$workingProgram = new WPDetailsModel(
		$workingProgramData->id,
		$workingProgramData->regularYear,
		$workingProgramData->academicYear,
		$workingProgramData->facultyName ?? '',
		$workingProgramData->departmentName ?? '',
		$workingProgramData->disciplineName ?? '',
		$workingProgramData->degreeName ?? '',
		$workingProgramData->fielfOfStudyIdx ?? '',
		$workingProgramData->fielfOfStudyName ?? '',
		$workingProgramData->specialtyIdx ?? '',
		$workingProgramData->specialtyName ?? '',
		$workingProgramData->educationalProgram ?? '',
		$workingProgramData->notes ?? '',
		$workingProgramData->prerequisites ?? '',
		$workingProgramData->goal ?? '',
		$workingProgramData->tasks ?? '',
		$workingProgramData->competences ?? '',
		$workingProgramData->programResults ?? '',
		$workingProgramData->controlMeasures ?? '',
		$workingProgramData->studingMethods ?? '',
		$workingProgramData->examingMethods ?? '',
		$workingProgramData->code ?? '',
		$workingProgramData->methodologicalSupport ?? '',
		$workingProgramData->individualTaskNotes ?? '',
		$workingProgramData->creditsAmount,
	);

	// Збираємо всі модулі
	$modulesInWorkingProgram = [];

	// Збираємо всі заняття по типах у всіх семестрах робочої програми
	$lectionsForWorkingProgram = [];
	$practicalsForWorkingProgram = [];
	$seminarsForWorkingProgram = [];
	$labsForWorkingProgram = [];
	$selfworksForWorkingProgram = [];

	// Обробляємо семестри робочої програми та трансформуємо їх у модель
	$formattedSemesters = $workingProgramData->semesters->map(function ($semester) use (
		&$modulesInWorkingProgram,
		&$lectionsForWorkingProgram,
		&$practicalsForWorkingProgram,
		&$seminarsForWorkingProgram,
		&$labsForWorkingProgram,
		&$selfworksForWorkingProgram,
	) {
		// Збираємо всі заняття по типах в семестрі
		$lectionsForSemester = [];
		$practicalsForSemester = [];
		$seminarsForSemester = [];
		$labsForSemester = [];
		$selfworksForSemester = [];

		// Обробляємо всі обрані форми навчання для даного семестру та трансформуємо їх у модель
		$educationalForms = $semester->educationalForms->map(function ($educationalForm) {
			return new SemesterEducationalFormModel(
				$educationalForm->id,
				$educationalForm->educationalDisciplineSemesterId,
				$educationalForm->educationalFormId,
				$educationalForm->educationalForm->name,
				getEducationalFormVisualName($educationalForm->educationalForm->name)
			);
		})->toArray();

		// Обробляємо модулі семестра та трансформуємо їх у модель
		$modules = $semester->modules->map(function ($module) use (&$lectionsForSemester, &$practicalsForSemester, &$seminarsForSemester, &$labsForSemester, &$selfworksForSemester, &$educationalForms) {
			// Збираємо всі заняття по типах в модулі
			$lectionsForModule = [];
			$practicalsForModule = [];
			$seminarsForModule = [];
			$labsForModule = [];
			$selfworksForModule = [];

			// Обробляємо теми модуля та трансформуємо їх у модель
			$themes = $module->themes->map(function ($theme) use (
				&$lectionsForModule,
				&$practicalsForModule,
				&$seminarsForModule,
				&$labsForModule,
				&$selfworksForModule,
				&$educationalForms,
			) {
				// Обробляємо лекції до теми та трансформуємо їх у модель
				$lections = getLessonWithEducationalFormLessonHour($theme->lections);
				$lectionsForModule = array_merge($lectionsForModule, $lections);

				// Обробляємо практичні до теми та трансформуємо їх у модель
				$practicals = getLessonWithEducationalFormLessonHour($theme->practicals);
				$practicalsForModule = array_merge($practicalsForModule, $practicals);

				// Обробляємо семінари до теми та трансформуємо їх у модель
				$seminars = getLessonWithEducationalFormLessonHour($theme->seminars);
				$seminarsForModule = array_merge($seminarsForModule, $seminars);

				// Обробляємо лабораторні до теми та трансформуємо їх у модель
				$labs = getLessonWithEducationalFormLessonHour($theme->labs);
				$labsForModule = array_merge($labsForModule, $labs);

				// Обробляємо самостійні до теми та трансформуємо їх у модель
				$selfworks = getLessonWithEducationalFormLessonHour($theme->selfworks);
				$selfworksForModule = array_merge($selfworksForModule, $selfworks);

				// Рахуємо всі години різних занять для теми
				$educationalFormHoursStructure = [];

				foreach ($educationalForms as $educationalForm) {
					$educationalFormHoursStructure[$educationalForm->colName] = getEducationalFormHoursStructureForTheme(
						$educationalForm->colName,
						$lections,
						$practicals,
						$seminars,
						$labs,
						$selfworks
					);
				};

				return new PDFThemeWithLessonsModel(
					$theme->id,
					$theme->name ?? "",
					$theme->description ?? "",
					$theme->themeNumber,
					$lections,
					$practicals,
					$seminars,
					$labs,
					$selfworks,
					$educationalForms,
					$educationalFormHoursStructure
				);
			})->toArray();

			// Додаємо заняття з модуля у масив усіх занять семестра по типах
			$lectionsForSemester = array_merge($lectionsForSemester, $lectionsForModule);
			$practicalsForSemester = array_merge($practicalsForSemester, $practicalsForModule);
			$seminarsForSemester = array_merge($seminarsForSemester, $seminarsForModule);
			$labsForSemester = array_merge($labsForSemester, $labsForModule);
			$selfworksForSemester = array_merge($selfworksForSemester, $selfworksForModule);

			// Рахуємо всі години різних занять для модуля
			$totalEducationalFormHoursStructureForModule = [];

			foreach ($educationalForms as $educationalForm) {
				$totalEducationalFormHoursStructureForModule[$educationalForm->colName] = getEducationalFormHoursStructureForTheme(
					$educationalForm->colName,
					$lectionsForModule,
					$practicalsForModule,
					$seminarsForModule,
					$labsForModule,
					$selfworksForModule
				);
			};

			return new PDFModuleModel(
				$module->id,
				$module->name ?? "",
				$module->moduleNumber,
				$themes,
				$totalEducationalFormHoursStructureForModule
			);
		})->toArray();

		// Додаємо модулі з семестра у масив усіх модулів
		$modulesInWorkingProgram = array_merge($modulesInWorkingProgram, $modules);

		// Додаємо заняття з семестра у масив усіх занять по типах
		$lectionsForWorkingProgram = array_merge($lectionsForWorkingProgram, $lectionsForSemester);
		$practicalsForWorkingProgram = array_merge($practicalsForWorkingProgram, $practicalsForSemester);
		$seminarsForWorkingProgram = array_merge($seminarsForWorkingProgram, $seminarsForSemester);
		$labsForWorkingProgram = array_merge($labsForWorkingProgram, $labsForSemester);
		$selfworksForWorkingProgram = array_merge($selfworksForWorkingProgram, $selfworksForSemester);

		// Рахуємо всі години різних занять для семестра
		$totalHoursForLections = getHoursSumForEducationalForms($lectionsForSemester, $educationalForms);
		$totalHoursForPracticals = getHoursSumForEducationalForms($practicalsForSemester, $educationalForms);
		$totalHoursForSeminars = getHoursSumForEducationalForms($seminarsForSemester, $educationalForms);
		$totalHoursForLabs = getHoursSumForEducationalForms($labsForSemester, $educationalForms);
		$totalHoursForSelfworks = getHoursSumForEducationalForms($selfworksForSemester, $educationalForms);

		// Рахуємо всі години різних занять для семестра
		$totalEducationalFormHoursStructureForSemester = [];

		foreach ($educationalForms as $educationalForm) {
			$totalEducationalFormHoursStructureForSemester[$educationalForm->colName] = getEducationalFormHoursStructureForTheme(
				$educationalForm->colName,
				$lectionsForSemester,
				$practicalsForSemester,
				$seminarsForSemester,
				$labsForSemester,
				$selfworksForSemester
			);
		};

		// Додаємо години для курсової роботи
		$courseworkHours = $semester->educationalFormCourseworkHours->map(function ($hours) {
			return new EducationalFormCourseworkHourModel(
				$hours->id,
				$hours->educationalFormId,
				$hours->semesterEducationalForm->educationalForm->name,
				$hours->hours
			);
		})->toArray();

		return new PDFSemesterModel(
			$semester->id,
			$semester->isCourseworkExists,
			$semester->courseworkAssessmentComponents,
			$semester->semesterNumber,
			$semester->examType,
			$modules,
			$educationalForms,
			$lectionsForSemester,
			$practicalsForSemester,
			$seminarsForSemester,
			$labsForSemester,
			$selfworksForSemester,
			$totalHoursForLections,
			$totalHoursForPracticals,
			$totalHoursForSeminars,
			$totalHoursForLabs,
			$totalHoursForSelfworks,
			$totalEducationalFormHoursStructureForSemester,
			$courseworkHours
		);
	})->toArray();

	// Додаємо дані про семестри в робочу програму
	$workingProgram->semesters = $formattedSemesters;

	// Визначаємо кількість навчальних форм обраних у всіх семестрах
	$availableEducationalFormsInWorkingProgram = getAllEducationalFormsAvailableInWorkingProgram($formattedSemesters);
	$workingProgram->availableEducationalForms = $availableEducationalFormsInWorkingProgram;

	// Рахуємо всі години різних занять для робочої програми
	$workingProgram->totalHoursForLections = getHoursSumForEducationalForms($lectionsForWorkingProgram, $availableEducationalFormsInWorkingProgram);
	$workingProgram->totalHoursForPracticals = getHoursSumForEducationalForms($practicalsForWorkingProgram, $availableEducationalFormsInWorkingProgram);
	$workingProgram->totalHoursForSeminars = getHoursSumForEducationalForms($seminarsForWorkingProgram, $availableEducationalFormsInWorkingProgram);
	$workingProgram->totalHoursForLabs = getHoursSumForEducationalForms($labsForWorkingProgram, $availableEducationalFormsInWorkingProgram);
	$workingProgram->totalHoursForSelfworks = getHoursSumForEducationalForms($selfworksForWorkingProgram, $availableEducationalFormsInWorkingProgram);

	//Обчислюємо кількість модулів у робочій програмі та додаємо до інформації про робочу програму
	$workingProgram->modulesInWorkingProgramAmount = count($modulesInWorkingProgram);

	// Обробляємо дані про людину, яка створила робочу програму, та трансформуємо у модель
	$formattedCreatedByPersons = $workingProgramData->createdByPersons->map(function ($involvedPerson) {
		return new WPInvolvedPersonModel(
			$involvedPerson->id,
			$involvedPerson->personId,
			$involvedPerson->involvedPersonRoleId,
			$involvedPerson->person->surname,
			$involvedPerson->person->name,
			$involvedPerson->person->patronymicName,
			$involvedPerson->person->degree,
			$involvedPerson->involvedRole->role
		);
	})->toArray();

	// Додаємо дані про людину, яка створила робочу програму, в інформацію про робочу програму
	$workingProgram->createdByPersons = $formattedCreatedByPersons;

	// Додаємо глобальні дані
	$workingProgram->globalData = getFullFormattedWorkingProgramGlobalData($workingProgramData->globalData);

	// Додаємо літературу
	$formattedLiterature = isset($workingProgramData->literature) ? new WorkingProgramLiteratureModel(
		$workingProgramData->literature->main,
		$workingProgramData->literature->supporting,
		$workingProgramData->literature->additional,
		$workingProgramData->literature->informationResources
	) : null;

	$workingProgram->literature = $formattedLiterature;

	return $workingProgram;
};
