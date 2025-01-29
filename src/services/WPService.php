<?php

namespace App\Services;

require_once __DIR__ . '/../models/DBEducationalDisciplineWorkingProgramModel.php';
require_once __DIR__ . '/../helpers/getLessonTypeIdByName.php';
require_once __DIR__ . '/../helpers/getTaskId.php';

use App\Models\DBEducationalDisciplineWorkingProgramModel;

use Illuminate\Database\Capsule\Manager as Capsule;

class WPService
{
	public function getWPList($wpCreatorId)
	{
		$workingPrograms = DBEducationalDisciplineWorkingProgramModel::with([
			'creator',
			'semesters' => function ($query) {
				$query
					->select(['semesterNumber', 'educationalDisciplineWPId'])
					->orderBy('semesterNumber');
			}
		])
			->select(['id', 'disciplineName', 'specialtyWithEducationalProgramIds', 'createdAt', 'wpCreatorId'])
			->where('wpCreatorId', $wpCreatorId)
			->orderBy('createdAt')
			->get();

		if (!empty($workingPrograms)) {
			foreach ($workingPrograms as $workingProgram) {
				$rawSpecialtyWithEducationalProgramIds = isset($workingProgram->specialtyWithEducationalProgramIds)
					? json_decode($workingProgram->specialtyWithEducationalProgramIds, true)
					: [];

				$specialtiesWithEducationalPrograms = [];

				foreach ($rawSpecialtyWithEducationalProgramIds as $item) {
					$key = array_key_first($item);
					$data = $item[$key];

					$specialty = null;
					$educationalPrograms = [];

					if (isset($data['specialtyId'])) {
						$specialty = Capsule::table('special')
							->selectRaw("
								MIN(id) AS id,
								CASE 
									WHEN INSTR(spec, '.') > 0 THEN SUBSTR(spec, 1, INSTR(spec, '.') - 1)
									ELSE spec
								END AS name,
								spec_num_code
							")
							->where('id', $data['specialtyId'])
							->groupBy('name', 'spec_num_code')
							->get()
							->first();
					}

					if (!empty($data['educationalProgramsIds'])) {
						$educationalPrograms = Capsule::table('special')
							->selectRaw("
								MIN(id) AS id,
								TRIM(
									CASE 
										WHEN INSTR(spec, '.') > 0 
										THEN SUBSTR(spec, INSTR(spec, '.') + 1)
										ELSE ''
									END
								) AS name
							")
							->whereIn('id', $data['educationalProgramsIds'])
							->groupBy('name')
							->get();
					}

					$specialtiesWithEducationalProgram = (object)[
						'specialtyName' => $specialty->name,
						'specialtyCode' => $specialty->spec_num_code,
						'educationalPrograms' => $educationalPrograms
					];

					$specialtiesWithEducationalPrograms[] = $specialtiesWithEducationalProgram;
				}

				$workingProgram->specialtiesWithEducationalPrograms = $specialtiesWithEducationalPrograms;
			}

			return (object) [
				"items" => $workingPrograms,
				"creator" => $workingPrograms[0]->creator
			];
		} else {
			$creator = Capsule::table('teachers')
				->select(['id', 't_name'])
				->where('id', $wpCreatorId)
				->get()
				->first();

			return (object) [
				"items" => collect(),
				"creator" => $creator
			];
		}
	}

	public function createNewWP($disciplineName, $wpCreatorId)
	{
		$wpId = Capsule::table('educationalDisciplineWorkingProgram')->insertGetId([
			'disciplineName' => $disciplineName,
			'wpCreatorId' =>  $wpCreatorId,
			'regularYear' => date("Y")
		]);

		return $wpId;
	}

	public function deleteWP($id)
	{
		// Use Capsule to delete the theme by ID
		$deleted = Capsule::table('educationalDisciplineWorkingProgram')->where('id', $id)->delete();

		// Check if any row was deleted
		if ($deleted) {
			echo json_encode(['status' => 'success', 'message' => 'Working program deleted successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Working program not found or delete failed']);
		}
	}

	public function updateWPDetails($id, $field, $value)
	{
		$wpDetails = Capsule::table('educationalDisciplineWorkingProgram')->where('id', $id)->first();

		if (!$wpDetails) {
			echo json_encode(['status' => 'error', 'message' => 'WP not found']);
			return;
		}

		$updated = Capsule::table('educationalDisciplineWorkingProgram')
			->where('id', $id)
			->update([$field => $value]);

		if ($updated) {
			return $updated;
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}

	public function getWPDetails($id)
	{
		$wps = DBEducationalDisciplineWorkingProgramModel::with([
			'semesters' => function ($query) {
				$query
					->with([
						'tasks' => function ($subquery) {
							$subquery->with([
								'taskType',
								'educationalFormTaskHours.semesterEducationalForm.educationalForm'
							]);
						},
						'additionalTasks' => function ($subquery) {
							$subquery->with([
								'taskType',
								'educationalFormTaskHours.semesterEducationalForm.educationalForm'
							]);
						},
						'calculationAndGraphicTypeTask' => function ($subquery) {
							$subquery->with([
								'taskType',
							]);
						},
						'educationalFormLessonSelfworkHours' => function ($subquery) {
							$subquery->with([
								'semesterEducationalForm.educationalForm'
							]);
						},
						'selfworks.educationalFormLessonHours.semesterEducationalForm.educationalForm'
					])
					->orderBy('semesterNumber');;
			},
			'semesters.modules' => function ($query) {
				$query
					->with([
						'tasks' => function ($subquery) {
							$subquery->with([
								'taskType',
								'educationalFormTaskHours.semesterEducationalForm.educationalForm'
							]);
						},
						'colloquium' => function ($subquery) {
							$subquery->with([
								'taskType',
							]);
						},
						'controlWork' => function ($subquery) {
							$subquery->with([
								'taskType',
							]);
						},
						'labs',
						'practicals',
						'seminars'
					])
					->orderBy('moduleNumber');
			},
			'semesters.modules.themes' => function ($query) {
				$query
					->with([
						'lections',
					])
					->orderBy('themeNumber');
			},
			'createdByPersons' => function ($query) {
				$query->with(['person' => function ($query) {
					$query->with('workPositionData');
				}, 'involvedRole']);
			},
			'semesters.educationalForms.educationalForm',
			'semesters.examType',
			'educationalProgramGuarantor' => function ($query) {
				$query->with(['person' => function ($query) {
					$query->with('workPositionData');
				}, 'involvedRole']);
			},
			'headOfDepartment' => function ($query) {
				$query->with(['person' => function ($query) {
					$query->with('workPositionData');
				}, 'involvedRole']);
			},
			'headOfCommission' => function ($query) {
				$query->with(['person' => function ($query) {
					$query->with('workPositionData');
				}, 'involvedRole']);
			},
			'approvedBy' => function ($query) {
				$query->with(['person' => function ($query) {
					$query->with('workPositionData');
				}, 'involvedRole']);
			},
			'docApprovedBy' => function ($query) {
				$query->with(['person' => function ($query) {
					$query->with('workPositionData');
				}, 'involvedRole']);
			},
			'semesters.educationalForms.educationalForm',
			'generalAssessmentCriteria',
			'practicalAssessmentCriteria',
			'seminarAssessmentCriteria',
			'laboratoryAssessmentCriteria',
			'courseworkAssessmentCriteria',
			'courseProjectAssessmentCriteria',
			'calculationAndGraphicWorkAssessmentCriteria',
			'calculationAndGraphicTaskAssessmentCriteria',
			'colloquiumAssessmentCriteria',
			'controlWorkAssessmentCriteria',
			'additionalTasksAssessmentCriterias',
			'literature',
			'creator'
		])
			->where('id', $id)
			->get();

		return $wps->first();
	}

	public function getWPDetailsForPDF($id)
	{
		$wp = DBEducationalDisciplineWorkingProgramModel::with([
			'semesters' => function ($query) {
				$query
					->with([
						'tasks' => function ($subquery) {
							$subquery->with([
								'taskType',
								'educationalFormTaskHours.semesterEducationalForm.educationalForm'
							]);
						},
						'additionalTasks' => function ($subquery) {
							$subquery->with([
								'taskType',
								'educationalFormTaskHours.semesterEducationalForm.educationalForm'
							]);
						},
						'educationalFormLessonSelfworkHours' => function ($subquery) {
							$subquery->with([
								'semesterEducationalForm.educationalForm'
							]);
						},
						'selfworks.educationalFormLessonHours.semesterEducationalForm.educationalForm',
						'examType'
					])
					->orderBy('semesterNumber');
			},
			'semesters.modules' => function ($query) {
				$query
					->with([
						'tasks' => function ($subquery) {
							$subquery->with([
								'taskType',
								'educationalFormTaskHours.semesterEducationalForm.educationalForm'
							]);
						}
					])
					->orderBy('moduleNumber');
			},
			'semesters.modules.themes' => function ($query) {
				$query->orderBy('themeNumber')
					->with([
						'lections.educationalFormLessonHours.semesterEducationalForm.educationalForm'
					]);
			},
			'semesters.modules.labs' => function ($query) {
				$query->orderBy('lessonNumber')
					->with([
						'educationalFormLessonHours.semesterEducationalForm.educationalForm',
					]);
			},
			'semesters.modules.practicals' => function ($query) {
				$query->orderBy('lessonNumber')
					->with([
						'educationalFormLessonHours.semesterEducationalForm.educationalForm'
					]);
			},
			'semesters.modules.seminars' => function ($query) {
				$query->orderBy('lessonNumber')
					->with([
						'educationalFormLessonHours.semesterEducationalForm.educationalForm'
					]);
			},
			'createdByPersons' => function ($query) {
				$query->with(['person' => function ($query) {
					$query->with('workPositionData');
				}, 'involvedRole']);
			},
			'educationalProgramGuarantor' => function ($query) {
				$query->with(['person' => function ($query) {
					$query->with('workPositionData');
				}, 'involvedRole']);
			},
			'headOfDepartment' => function ($query) {
				$query->with(['person' => function ($query) {
					$query->with('workPositionData');
				}, 'involvedRole']);
			},
			'headOfCommission' => function ($query) {
				$query->with(['person' => function ($query) {
					$query->with('workPositionData');
				}, 'involvedRole']);
			},
			'approvedBy' => function ($query) {
				$query->with(['person' => function ($query) {
					$query->with('workPositionData');
				}, 'involvedRole']);
			},
			'docApprovedBy' => function ($query) {
				$query->with(['person' => function ($query) {
					$query->with('workPositionData');
				}, 'involvedRole']);
			},
			'semesters.educationalForms.educationalForm',
			'generalAssessmentCriteria',
			'practicalAssessmentCriteria',
			'seminarAssessmentCriteria',
			'laboratoryAssessmentCriteria',
			'courseworkAssessmentCriteria',
			'courseProjectAssessmentCriteria',
			'calculationAndGraphicWorkAssessmentCriteria',
			'calculationAndGraphicTaskAssessmentCriteria',
			'colloquiumAssessmentCriteria',
			'controlWorkAssessmentCriteria',
			'additionalTasksAssessmentCriterias',
			'literature',
			'faculty',
			'department',
			'stydingLevel',
			'subjectType'
		])
			->where('id', $id)
			->get()
			->first();

		$fieldsOfStudyIds = json_decode($wp->fieldsOfStudyIds ?? '[]', true);

		if (!empty($fieldsOfStudyIds)) {
			$fieldsOfStudy = Capsule::table('fieldsOfStudy')
				->select('id', 'name')
				->whereIn('id', $fieldsOfStudyIds)
				->get();

			$wp->fieldsOfStudy = $fieldsOfStudy;
		} else {
			$wp->fieldsOfStudy = collect();
		}

		$rawSpecialtyWithEducationalProgramIds = isset($wp->specialtyWithEducationalProgramIds)
			? json_decode($wp->specialtyWithEducationalProgramIds, true)
			: [];

		$specialtiesIds = [];
		$educationalProgramsIds = [];

		foreach ($rawSpecialtyWithEducationalProgramIds as $item) {
			$key = array_key_first($item);
			$data = $item[$key];

			if (isset($data['specialtyId'])) {
				$specialtiesIds[] = [$data['specialtyId']];
			}

			if (!empty($data['educationalProgramsIds'])) {
				$educationalProgramsIds = array_merge($educationalProgramsIds, $data['educationalProgramsIds']);
			}
		}

		if (!empty($specialtiesIds)) {
			$specialties = Capsule::table('special')
				->selectRaw("
					MIN(id) AS id,
					CASE 
						WHEN INSTR(spec, '.') > 0 THEN SUBSTR(spec, 1, INSTR(spec, '.') - 1)
						ELSE spec
					END AS name,
					spec_num_code
				")
				->whereIn('id', $specialtiesIds)
				->groupBy('name', 'spec_num_code')
				->get();

			$wp->specialties = $specialties;
		} else {
			$wp->specialties = collect();
		}

		if (!empty($educationalProgramsIds)) {
			$educationalPrograms = Capsule::table('special')
				->selectRaw("
					MIN(id) AS id,
					TRIM(
						CASE 
							WHEN INSTR(spec, '.') > 0 
							THEN SUBSTR(spec, INSTR(spec, '.') + 1)
							ELSE ''
						END
					) AS name
				")
				->whereIn('id', $educationalProgramsIds)
				->groupBy('name')
				->get();

			$wp->educationalPrograms = $educationalPrograms;
		} else {
			$wp->educationalPrograms = collect();
		}

		return $wp;
	}

	// Функція для дублювання робочої програми
	public function duplicateWP($wpId)
	{
		$newWPData = [];

		$lessonTypeIds = getLessonTypeIdByName();
		$taskTypeIds = getTaskId();

		try {
			// Починаємо транзакцію, щоб відмінити всі зміни, якщо трапиться помилка посеред процесу дублювання 
			Capsule::transaction(function () use ($wpId, &$newWPData, &$lessonTypeIds, &$taskTypeIds) {
				// Дістаємо всі дані робочої програми
				$oldWPData = Capsule::table('educationalDisciplineWorkingProgram')->where('id', $wpId)->first();

				$oldWPData = (array)$oldWPData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
				$newDisciplineName = $oldWPData['disciplineName'] . " (Копія)"; // Створюємо нову назву дисципліни

				unset($oldWPData['id']); // Видаляємо з скопійованих даних id
				unset($oldWPData['createdAt']); // Видаляємо з скопійованих даних дату створення
				unset($oldWPData['disciplineName']); // Видаляємо з скопійованих даних назву дисципліни
				$oldWPData['disciplineName'] = $newDisciplineName; // Вставляємо нову назву дисципліни

				// Створюємо нову робочу програму зі скопійованими даними та отримуємо нову id
				$newWPId = Capsule::table('educationalDisciplineWorkingProgram')->insertGetId($oldWPData);

				$newWPData = Capsule::table('educationalDisciplineWorkingProgram')
					->where('id', $newWPId)
					->first();

				// Дістаємо значення загальних критеріїв оцінювання для даної робочої програми
				$oldGeneralAssessmentCriterias = Capsule::table('assessmentCriterias')
					->where('educationalDisciplineWPId', $wpId)
					->where('isGeneral', true)
					->first();

				$oldGeneralAssessmentCriterias = (array)$oldGeneralAssessmentCriterias; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
				unset($oldGeneralAssessmentCriterias['id']); // Видаляємо з скопійованих даних id
				unset($oldGeneralAssessmentCriterias['educationalDisciplineWPId']); // Видаляємо з скопійованих даних id старої робочої програми
				$oldGeneralAssessmentCriterias['educationalDisciplineWPId'] = $newWPId; // Вставляємо id нової робочої програми

				// Створюємо новий запис критеріїв оцінювання
				Capsule::table('assessmentCriterias')->insertGetId($oldGeneralAssessmentCriterias);

				// Дістаємо значення критеріїв оцінювання практичних робіт для даної робочої програми
				$oldPracticalAssessmentCriterias = Capsule::table('assessmentCriterias')
					->where('educationalDisciplineWPId', $wpId)
					->where('lessonTypeId', $lessonTypeIds->practical)
					->first();

				// Перевіряємо чи є критерії оцінювання практичних робіт
				if ($oldPracticalAssessmentCriterias) {
					$oldPracticalAssessmentCriterias = (array)$oldPracticalAssessmentCriterias; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
					unset($oldPracticalAssessmentCriterias['id']); // Видаляємо з скопійованих даних id
					unset($oldPracticalAssessmentCriterias['educationalDisciplineWPId']); // Видаляємо з скопійованих даних id старої робочої програми
					$oldPracticalAssessmentCriterias['educationalDisciplineWPId'] = $newWPId; // Вставляємо id нової робочої програми

					// Створюємо новий запис критеріїв оцінювання
					Capsule::table('assessmentCriterias')->insertGetId($oldPracticalAssessmentCriterias);
				}

				// Дістаємо значення критеріїв оцінювання лабораторних робіт для даної робочої програми
				$oldLaboratoryAssessmentCriterias = Capsule::table('assessmentCriterias')
					->where('educationalDisciplineWPId', $wpId)
					->where('lessonTypeId', $lessonTypeIds->laboratory)
					->first();

				// Перевіряємо чи є критерії оцінювання лабораторних робіт
				if ($oldLaboratoryAssessmentCriterias) {
					$oldLaboratoryAssessmentCriterias = (array)$oldLaboratoryAssessmentCriterias; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
					unset($oldLaboratoryAssessmentCriterias['id']); // Видаляємо з скопійованих даних id
					unset($oldLaboratoryAssessmentCriterias['educationalDisciplineWPId']); // Видаляємо з скопійованих даних id старої робочої програми
					$oldLaboratoryAssessmentCriterias['educationalDisciplineWPId'] = $newWPId; // Вставляємо id нової робочої програми

					// Створюємо новий запис критеріїв оцінювання
					Capsule::table('assessmentCriterias')->insertGetId($oldLaboratoryAssessmentCriterias);
				}

				// Дістаємо значення критеріїв оцінювання семінарських робіт для даної робочої програми
				$oldSeminarAssessmentCriterias = Capsule::table('assessmentCriterias')
					->where('educationalDisciplineWPId', $wpId)
					->where('lessonTypeId', $lessonTypeIds->seminar)
					->first();

				// Перевіряємо чи є критерії оцінювання лабораторних робіт
				if ($oldSeminarAssessmentCriterias) {
					$oldSeminarAssessmentCriterias = (array)$oldSeminarAssessmentCriterias; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
					unset($oldSeminarAssessmentCriterias['id']); // Видаляємо з скопійованих даних id
					unset($oldSeminarAssessmentCriterias['educationalDisciplineWPId']); // Видаляємо з скопійованих даних id старої робочої програми
					$oldSeminarAssessmentCriterias['educationalDisciplineWPId'] = $newWPId; // Вставляємо id нової робочої програми

					// Створюємо новий запис критеріїв оцінювання
					Capsule::table('assessmentCriterias')->insertGetId($oldSeminarAssessmentCriterias);
				}

				// Дістаємо значення критеріїв оцінювання курсової роботи для даної робочої програми
				$oldCourseworkAssessmentCriterias = Capsule::table('assessmentCriterias')
					->where('educationalDisciplineWPId', $wpId)
					->where('taskTypeId', $taskTypeIds->coursework)
					->first();

				// Перевіряємо чи є критерії оцінювання курсової роботи
				if ($oldCourseworkAssessmentCriterias) {
					$oldCourseworkAssessmentCriterias = (array)$oldCourseworkAssessmentCriterias; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
					unset($oldCourseworkAssessmentCriterias['id']); // Видаляємо з скопійованих даних id
					unset($oldCourseworkAssessmentCriterias['educationalDisciplineWPId']); // Видаляємо з скопійованих даних id старої робочої програми
					$oldCourseworkAssessmentCriterias['educationalDisciplineWPId'] = $newWPId; // Вставляємо id нової робочої програми

					// Створюємо новий запис критеріїв оцінювання
					Capsule::table('assessmentCriterias')->insertGetId($oldCourseworkAssessmentCriterias);
				}

				// Дістаємо значення критеріїв оцінювання курсового проєкту для даної робочої програми
				$oldCourseProjectAssessmentCriterias = Capsule::table('assessmentCriterias')
					->where('educationalDisciplineWPId', $wpId)
					->where('taskTypeId', $taskTypeIds->courseProject)
					->first();

				// Перевіряємо чи є критерії оцінювання курсового проєкту
				if ($oldCourseProjectAssessmentCriterias) {
					$oldCourseProjectAssessmentCriterias = (array)$oldCourseProjectAssessmentCriterias; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
					unset($oldCourseProjectAssessmentCriterias['id']); // Видаляємо з скопійованих даних id
					unset($oldCourseProjectAssessmentCriterias['educationalDisciplineWPId']); // Видаляємо з скопійованих даних id старої робочої програми
					$oldCourseProjectAssessmentCriterias['educationalDisciplineWPId'] = $newWPId; // Вставляємо id нової робочої програми

					// Створюємо новий запис критеріїв оцінювання
					Capsule::table('assessmentCriterias')->insertGetId($oldCourseProjectAssessmentCriterias);
				}

				// Дістаємо значення критеріїв оцінювання РГР для даної робочої програми
				$oldCalculationAndGraphicWorkAssessmentCriterias = Capsule::table('assessmentCriterias')
					->where('educationalDisciplineWPId', $wpId)
					->where('taskTypeId', $taskTypeIds->calculationAndGraphicWork)
					->first();

				// Перевіряємо чи є критерії оцінювання РГР
				if ($oldCalculationAndGraphicWorkAssessmentCriterias) {
					$oldCalculationAndGraphicWorkAssessmentCriterias = (array)$oldCalculationAndGraphicWorkAssessmentCriterias; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
					unset($oldCalculationAndGraphicWorkAssessmentCriterias['id']); // Видаляємо з скопійованих даних id
					unset($oldCalculationAndGraphicWorkAssessmentCriterias['educationalDisciplineWPId']); // Видаляємо з скопійованих даних id старої робочої програми
					$oldCalculationAndGraphicWorkAssessmentCriterias['educationalDisciplineWPId'] = $newWPId; // Вставляємо id нової робочої програми

					// Створюємо новий запис критеріїв оцінювання
					Capsule::table('assessmentCriterias')->insertGetId($oldCalculationAndGraphicWorkAssessmentCriterias);
				}

				// Дістаємо значення критеріїв оцінювання РГЗ для даної робочої програми
				$oldCalculationAndGraphicTaskAssessmentCriterias = Capsule::table('assessmentCriterias')
					->where('educationalDisciplineWPId', $wpId)
					->where('taskTypeId', $taskTypeIds->calculationAndGraphicTask)
					->first();

				// Перевіряємо чи є критерії оцінювання РГЗ
				if ($oldCalculationAndGraphicTaskAssessmentCriterias) {
					$oldCalculationAndGraphicTaskAssessmentCriterias = (array)$oldCalculationAndGraphicTaskAssessmentCriterias; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
					unset($oldCalculationAndGraphicTaskAssessmentCriterias['id']); // Видаляємо з скопійованих даних id
					unset($oldCalculationAndGraphicTaskAssessmentCriterias['educationalDisciplineWPId']); // Видаляємо з скопійованих даних id старої робочої програми
					$oldCalculationAndGraphicTaskAssessmentCriterias['educationalDisciplineWPId'] = $newWPId; // Вставляємо id нової робочої програми

					// Створюємо новий запис критеріїв оцінювання
					Capsule::table('assessmentCriterias')->insertGetId($oldCalculationAndGraphicTaskAssessmentCriterias);
				}

				// Дістаємо значення критеріїв оцінювання колоквіумів для даної робочої програми
				$oldColloquiumAssessmentCriterias = Capsule::table('assessmentCriterias')
					->where('educationalDisciplineWPId', $wpId)
					->where('taskTypeId', $taskTypeIds->colloquium)
					->first();

				// Перевіряємо чи є критерії оцінювання колоквіумів
				if ($oldColloquiumAssessmentCriterias) {
					$oldColloquiumAssessmentCriterias = (array)$oldColloquiumAssessmentCriterias; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
					unset($oldColloquiumAssessmentCriterias['id']); // Видаляємо з скопійованих даних id
					unset($oldColloquiumAssessmentCriterias['educationalDisciplineWPId']); // Видаляємо з скопійованих даних id старої робочої програми
					$oldColloquiumAssessmentCriterias['educationalDisciplineWPId'] = $newWPId; // Вставляємо id нової робочої програми

					// Створюємо новий запис критеріїв оцінювання
					Capsule::table('assessmentCriterias')->insertGetId($oldColloquiumAssessmentCriterias);
				}

				// Дістаємо значення критеріїв оцінювання контрольних робіт для даної робочої програми
				$oldControlWorkAssessmentCriterias = Capsule::table('assessmentCriterias')
					->where('educationalDisciplineWPId', $wpId)
					->where('taskTypeId', $taskTypeIds->controlWork)
					->first();

				// Перевіряємо чи є критерії оцінювання контрольних робіт
				if ($oldControlWorkAssessmentCriterias) {
					$oldControlWorkAssessmentCriterias = (array)$oldControlWorkAssessmentCriterias; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
					unset($oldControlWorkAssessmentCriterias['id']); // Видаляємо з скопійованих даних id
					unset($oldControlWorkAssessmentCriterias['educationalDisciplineWPId']); // Видаляємо з скопійованих даних id старої робочої програми
					$oldControlWorkAssessmentCriterias['educationalDisciplineWPId'] = $newWPId; // Вставляємо id нової робочої програми

					// Створюємо новий запис критеріїв оцінювання
					Capsule::table('assessmentCriterias')->insertGetId($oldControlWorkAssessmentCriterias);
				}

				// Дістаємо значення критеріїв оцінювання додаткових завдань для даної робочої програми
				$oldAdditionalTaskAssessmentCriterias = Capsule::table('assessmentCriterias')
					->where('educationalDisciplineWPId', $wpId)
					->where('isAdditionalTask', true)
					->get();

				// Перебираємо критерії оцінюванн для всіх додаткових завдань
				foreach ($oldAdditionalTaskAssessmentCriterias as $oldCriteriasData) {
					$oldCriteriasData = (array)$oldCriteriasData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
					unset($oldCriteriasData['id']); // Видаляємо з скопійованих даних id
					unset($oldCriteriasData['educationalDisciplineWPId']); // Видаляємо з скопійованих даних id старої робочої програми
					$oldCriteriasData['educationalDisciplineWPId'] = $newWPId; // Вставляємо id нової робочої програми

					// Створюємо новий запис критеріїв оцінювання
					Capsule::table('assessmentCriterias')->insertGetId($oldCriteriasData);
				}

				// Дістаємо літературу для даної робочої програми
				$oldWorkingProgramLiteratureData = Capsule::table('workingProgramLiterature')
					->where('educationalDisciplineWorkingProgramId', $wpId)
					->first();

				$oldWorkingProgramLiteratureData = (array)$oldWorkingProgramLiteratureData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
				unset($oldWorkingProgramLiteratureData['id']); // Видаляємо з скопійованих даних id
				unset($oldWorkingProgramLiteratureData['educationalDisciplineWorkingProgramId']); // Видаляємо з скопійованих даних id старої робочої програми
				$oldWorkingProgramLiteratureData['educationalDisciplineWorkingProgramId'] = $newWPId; // Вставляємо id нової робочої програми

				// Створюємо новий запис літератури
				Capsule::table('workingProgramLiterature')->insertGetId($oldWorkingProgramLiteratureData);

				// Дістаємо залучених особ для даної робочої програми
				$oldWorkingProgramInvolvedPersonsData = Capsule::table('workingProgramInvolvedPersons')
					->where('educationalDisciplineWPId', $wpId)
					->get();

				// Перебираємо всіх залучених осіб 
				foreach ($oldWorkingProgramInvolvedPersonsData as $oldPersonData) {
					$oldPersonData = (array)$oldPersonData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
					unset($oldPersonData['id']); // Видаляємо з скопійованих даних id
					unset($oldPersonData['educationalDisciplineWPId']); // Видаляємо з скопійованих даних id старої робочої програми
					$oldPersonData['educationalDisciplineWPId'] = $newWPId; // Вставляємо id нової робочої програми

					// Створюємо новий запис залученої особи
					Capsule::table('workingProgramInvolvedPersons')->insertGetId($oldPersonData);
				}

				// Дістаємо семестри для даної робочої програми
				$oldSemestersData = Capsule::table('educationalDisciplineSemester')
					->where('educationalDisciplineWPId', $wpId)
					->get();

				// Перебираємо всі семестри 
				foreach ($oldSemestersData as $oldSemesterData) {
					$oldSemesterData = (array)$oldSemesterData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
					$oldSemesterId = $oldSemesterData['id']; // Зберігаємо id старого семестру

					unset($oldSemesterData['id']); // Видаляємо з скопійованих даних id
					unset($oldSemesterData['educationalDisciplineWPId']); // Видаляємо з скопійованих даних id старої робочої програми
					$oldSemesterData['educationalDisciplineWPId'] = $newWPId; // Вставляємо id нової робочої програми

					// Створюємо новий запис семестру та отримуємо id
					$newSemesterId = Capsule::table('educationalDisciplineSemester')->insertGetId($oldSemesterData);

					// Дістаємо всі навчальні форми для даного семестру
					$oldSemesterEducationFormsData = Capsule::table('educationalDisciplineSemesterEducationForm')
						->where('educationalDisciplineSemesterId', $oldSemesterId)
						->get();

					$oldEducationFormIdToNewMap = [];

					// Перебираємо всі навчальні форми для даного семестру
					foreach ($oldSemesterEducationFormsData as $oldSemesterEducationFormData) {
						$oldSemesterEducationFormData = (array)$oldSemesterEducationFormData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
						$oldSemesterEducationFormId = $oldSemesterEducationFormData['id']; // Зберігаємо id старої навчальної форми

						unset($oldSemesterEducationFormData['id']); // Видаляємо з скопійованих даних id
						unset($oldSemesterEducationFormData['educationalDisciplineSemesterId']); // Видаляємо з скопійованих даних id старого семестру
						$oldSemesterEducationFormData['educationalDisciplineSemesterId'] = $newSemesterId; // Вставляємо id нового семестру

						// Створюємо новий навчальні форми для даного семестру та отримуємо id
						$newEducationFormId = Capsule::table('educationalDisciplineSemesterEducationForm')->insertGetId($oldSemesterEducationFormData);

						// Додаємо до масиву відповідні значення старої та нової id навчальної форми
						$oldEducationFormIdToNewMap[$oldSemesterEducationFormId] = $newEducationFormId;
					}

					// Дістаємо всі модулі для даного семестру
					$oldModulesData = Capsule::table('modules')
						->where('educationalDisciplineSemesterId', $oldSemesterId)
						->get();

					// Перебираємо всі модулі 
					foreach ($oldModulesData as $oldModuleData) {
						$oldModuleData = (array)$oldModuleData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
						$oldModuleId = $oldModuleData['id']; // Зберігаємо id старого модуля

						unset($oldModuleData['id']); // Видаляємо з скопійованих даних id
						unset($oldModuleData['educationalDisciplineSemesterId']); // Видаляємо з скопійованих даних id старого семестру
						$oldModuleData['educationalDisciplineSemesterId'] = $newSemesterId; // Вставляємо id нового семестру

						// Створюємо новий запис модуля та отримуємо id
						$newModuleId = Capsule::table('modules')->insertGetId($oldModuleData);

						// Дістаємо всі теми для даного модуля
						$oldThemesData = Capsule::table('themes')
							->where('moduleId', $oldModuleId)
							->get();

						// Перебираємо всі теми 
						foreach ($oldThemesData as $oldThemeData) {
							$oldThemeData = (array)$oldThemeData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
							$oldThemeId = $oldThemeData['id']; // Зберігаємо id старої теми

							unset($oldThemeData['id']); // Видаляємо з скопійованих даних id
							unset($oldThemeData['moduleId']); // Видаляємо з скопійованих даних id модуля
							$oldThemeData['moduleId'] = $newModuleId; // Вставляємо id нового модуля

							// Створюємо новий запис теми та отримуємо id
							$newThemeId = Capsule::table('themes')->insertGetId($oldThemeData);

							// Дістаємо всі лекції для даної теми
							$oldLectionsData = Capsule::table('lessons')
								->where('themeId', $oldThemeId)
								->get();

							// Перебираємо всі лекції
							foreach ($oldLectionsData as $oldLectionData) {
								$oldLectionData = (array)$oldLectionData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
								$oldLessonId = $oldLectionData['id']; // Зберігаємо id старого уроку

								unset($oldLectionData['id']); // Видаляємо з скопійованих даних id
								unset($oldLectionData['themeId']); // Видаляємо з скопійованих даних id теми
								$oldLectionData['themeId'] = $newThemeId; // Вставляємо id нової теми

								// Створюємо новий запис уроку та отримуємо id
								$newLessonId = Capsule::table('lessons')->insertGetId($oldLectionData);

								// Дістаємо всі години (з різними формами навчання) для даного уроку
								$oldLessonHoursData = Capsule::table('educationalFormLessonHours')
									->where('lessonId', $oldLessonId)
									->get();

								// Перебираємо всі години
								foreach ($oldLessonHoursData as $oldLessonHourData) {
									$oldLessonHourData = (array)$oldLessonHourData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними

									unset($oldLessonHourData['id']); // Видаляємо з скопійованих даних id
									unset($oldLessonHourData['lessonId']); // Видаляємо з скопійованих даних id уроку
									$oldLessonHourData['lessonId'] = $newLessonId; // Вставляємо id нового уроку

									$oldLessonEducationalFormId = $oldLessonHourData['educationalFormId']; // Зберігаємо id старої навчальної форми
									unset($oldLessonHourData['educationalFormId']); // Видаляємо з скопійованих даних id старої навчальної форми
									$oldLessonHourData['educationalFormId'] = $oldEducationFormIdToNewMap[$oldLessonEducationalFormId]; // Вставляємо id нової навчальної форми

									// Створюємо новий запис годин (для певної форми навчання) для даного уроку
									Capsule::table('educationalFormLessonHours')->insertGetId($oldLessonHourData);
								}
							}
						}

						// Дістаємо всі семінарські, практичні та лабораторні заняття для даного модуля
						$oldLessonsData = Capsule::table('lessons')
							->where('moduleId', $oldModuleId)
							->get();

						// Перебираємо всі семінарські, практичні та лабораторні заняття
						foreach ($oldLessonsData as $oldLessonData) {
							$oldLessonData = (array)$oldLessonData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
							$oldLessonId = $oldLessonData['id']; // Зберігаємо id старого уроку

							unset($oldLessonData['id']); // Видаляємо з скопійованих даних id
							unset($oldLessonData['moduleId']); // Видаляємо з скопійованих даних id модуля
							$oldLessonData['moduleId'] = $newModuleId; // Вставляємо id нового модуля

							// Створюємо новий запис уроку та отримуємо id
							$newLessonId = Capsule::table('lessons')->insertGetId($oldLessonData);

							// Дістаємо всі години (з різними формами навчання) для даного уроку
							$oldLessonHoursData = Capsule::table('educationalFormLessonHours')
								->where('lessonId', $oldLessonId)
								->get();

							// Перебираємо всі години
							foreach ($oldLessonHoursData as $oldLessonHourData) {
								$oldLessonHourData = (array)$oldLessonHourData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними

								unset($oldLessonHourData['id']); // Видаляємо з скопійованих даних id
								unset($oldLessonHourData['lessonId']); // Видаляємо з скопійованих даних id уроку
								$oldLessonHourData['lessonId'] = $newLessonId; // Вставляємо id нового уроку

								$oldLessonEducationalFormId = $oldLessonHourData['educationalFormId']; // Зберігаємо id старої навчальної форми
								unset($oldLessonHourData['educationalFormId']); // Видаляємо з скопійованих даних id старої навчальної форми
								$oldLessonHourData['educationalFormId'] = $oldEducationFormIdToNewMap[$oldLessonEducationalFormId]; // Вставляємо id нової навчальної форми

								// Створюємо новий запис годин (для певної форми навчання) для даного уроку
								Capsule::table('educationalFormLessonHours')->insertGetId($oldLessonHourData);
							}
						}

						// Дістаємо всі індивідуальні завдання для модуля
						$oldModuleTasksDetailsData = Capsule::table('taskDetails')
							->where('moduleId', $oldModuleId)
							->get();

						// Перебираємо всі індивідуальні завдання 
						foreach ($oldModuleTasksDetailsData as $oldModuleTaskDetailsData) {
							$oldModuleTaskDetailsData = (array)$oldModuleTaskDetailsData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
							$oldModuleTaskDetailsId = $oldModuleTaskDetailsData['id']; // Зберігаємо id старого індивідуального завдання

							unset($oldModuleTaskDetailsData['id']); // Видаляємо з скопійованих даних id
							unset($oldModuleTaskDetailsData['moduleId']); // Видаляємо з скопійованих даних id модуля
							$oldModuleTaskDetailsData['moduleId'] = $newModuleId; // Вставляємо id нового модуля

							// Створюємо новий для індивідуального завдання та отримуємо Id
							$newTaskDetailsId = Capsule::table('taskDetails')->insertGetId($oldModuleTaskDetailsData);

							// Дістаємо всі години (з різними формами навчання) для індивідуального завдання
							$oldTaskHoursData = Capsule::table('educationalFormTaskHours')
								->where('taskDetailsId', $oldModuleTaskDetailsId)
								->get();

							// Перебираємо всі години
							foreach ($oldTaskHoursData as $oldTaskHourData) {
								$oldTaskHourData = (array)$oldTaskHourData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними

								unset($oldTaskHourData['id']); // Видаляємо з скопійованих даних id
								unset($oldTaskHourData['taskDetailsId']); // Видаляємо з скопійованих даних id уроку
								$oldTaskHourData['taskDetailsId'] = $newTaskDetailsId; // Вставляємо id нового уроку

								$oldTaskEducationalFormId = $oldTaskHourData['educationalFormId']; // Зберігаємо id старої навчальної форми
								unset($oldTaskHourData['educationalFormId']); // Видаляємо з скопійованих даних id старої навчальної форми
								$oldTaskHourData['educationalFormId'] = $oldEducationFormIdToNewMap[$oldTaskEducationalFormId]; // Вставляємо id нової навчальної форми

								// Створюємо новий запис годин (для певної форми навчання) для даного уроку
								Capsule::table('educationalFormTaskHours')->insertGetId($oldTaskHourData);
							}
						}
					}

					// Дістаємо всі самостійні для даного модуля
					$oldSelfworksData = Capsule::table('lessons')
						->where('semesterId', $oldSemesterId)
						->get();

					// Перебираємо всі самостійні
					foreach ($oldSelfworksData as $oldSelfworkData) {
						$oldSelfworkData = (array)$oldSelfworkData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
						$oldLessonId = $oldSelfworkData['id']; // Зберігаємо id старого уроку

						unset($oldSelfworkData['id']); // Видаляємо з скопійованих даних id
						unset($oldSelfworkData['semesterId']); // Видаляємо з скопійованих даних id семестру
						$oldSelfworkData['semesterId'] = $newSemesterId; // Вставляємо id нового семестру

						// Створюємо новий запис уроку та отримуємо id
						$newLessonId = Capsule::table('lessons')->insertGetId($oldSelfworkData);

						// Дістаємо всі години (з різними формами навчання) для даного уроку
						$oldLessonHoursData = Capsule::table('educationalFormLessonHours')
							->where('lessonId', $oldLessonId)
							->get();

						// Перебираємо всі години
						foreach ($oldLessonHoursData as $oldLessonHourData) {
							$oldLessonHourData = (array)$oldLessonHourData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними

							unset($oldLessonHourData['id']); // Видаляємо з скопійованих даних id
							unset($oldLessonHourData['lessonId']); // Видаляємо з скопійованих даних id уроку
							$oldLessonHourData['lessonId'] = $newLessonId; // Вставляємо id нового уроку

							$oldLessonEducationalFormId = $oldLessonHourData['educationalFormId']; // Зберігаємо id старої навчальної форми
							unset($oldLessonHourData['educationalFormId']); // Видаляємо з скопійованих даних id старої навчальної форми
							$oldLessonHourData['educationalFormId'] = $oldEducationFormIdToNewMap[$oldLessonEducationalFormId]; // Вставляємо id нової навчальної форми

							// Створюємо новий запис годин (для певної форми навчання) для даного уроку
							Capsule::table('educationalFormLessonHours')->insertGetId($oldLessonHourData);
						}
					}

					// Дістаємо всі години для завдань для самостійного опрацювання даного семестра та даної навчальної форми
					$oldEducationalFormLessonSelfworkHoursData = Capsule::table('educationalFormLessonSelfworkHours')
						->where('semesterId', $oldSemesterId)
						->get();

					// Перебираємо всі дані 
					foreach ($oldEducationalFormLessonSelfworkHoursData as $oldEducationalFormLessonSelfworkHourData) {
						$oldEducationalFormLessonSelfworkHourData = (array)$oldEducationalFormLessonSelfworkHourData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними

						unset($oldEducationalFormLessonSelfworkHourData['id']); // Видаляємо з скопійованих даних id
						unset($oldEducationalFormLessonSelfworkHourData['semesterId']); // Видаляємо з скопійованих даних id семестру
						$oldEducationalFormLessonSelfworkHourData['semesterId'] = $newSemesterId; // Вставляємо id нового семестру

						$oldEducationalFormId = $oldEducationalFormLessonSelfworkHourData['educationalFormId']; // Зберігаємо id старої навчальної форми
						unset($oldEducationalFormLessonSelfworkHourData['educationalFormId']); // Видаляємо з скопійованих даних id навчальної форми
						$oldEducationalFormLessonSelfworkHourData['educationalFormId'] = $oldEducationFormIdToNewMap[$oldEducationalFormId]; // Вставляємо id нової навчальної форми

						// Створюємо новий запис годин (для певної форми навчання) для самостійного опрацювання
						Capsule::table('educationalFormLessonSelfworkHours')->insertGetId($oldEducationalFormLessonSelfworkHourData);
					}

					// Дістаємо всі індивідуальні завдання для семестру
					$oldTasksDetailsData = Capsule::table('taskDetails')
						->where('semesterId', $oldSemesterId)
						->get();

					// Перебираємо всі індивідуальні завдання 
					foreach ($oldTasksDetailsData as $oldTaskDetailsData) {
						$oldTaskDetailsData = (array)$oldTaskDetailsData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
						$oldTaskDetailsId = $oldTaskDetailsData['id']; // Зберігаємо id старого індивідуального завдання

						unset($oldTaskDetailsData['id']); // Видаляємо з скопійованих даних id
						unset($oldTaskDetailsData['semesterId']); // Видаляємо з скопійованих даних id семестру
						$oldTaskDetailsData['semesterId'] = $newSemesterId; // Вставляємо id нового семестру

						// Створюємо новий для індивідуального завдання та отримуємо Id
						$newTaskDetailsId = Capsule::table('taskDetails')->insertGetId($oldTaskDetailsData);

						// Дістаємо всі години (з різними формами навчання) для індивідуального завдання
						$oldTaskHoursData = Capsule::table('educationalFormTaskHours')
							->where('taskDetailsId', $oldTaskDetailsId)
							->get();

						// Перебираємо всі години
						foreach ($oldTaskHoursData as $oldTaskHourData) {
							$oldTaskHourData = (array)$oldTaskHourData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними

							unset($oldTaskHourData['id']); // Видаляємо з скопійованих даних id
							unset($oldTaskHourData['taskDetailsId']); // Видаляємо з скопійованих даних id уроку
							$oldTaskHourData['taskDetailsId'] = $newTaskDetailsId; // Вставляємо id нового уроку

							$oldTaskEducationalFormId = $oldTaskHourData['educationalFormId']; // Зберігаємо id старої навчальної форми
							unset($oldTaskHourData['educationalFormId']); // Видаляємо з скопійованих даних id старої навчальної форми
							$oldTaskHourData['educationalFormId'] = $oldEducationFormIdToNewMap[$oldTaskEducationalFormId]; // Вставляємо id нової навчальної форми

							// Створюємо новий запис годин (для певної форми навчання) для даного уроку
							Capsule::table('educationalFormTaskHours')->insertGetId($oldTaskHourData);
						}
					}
				}

				$rawSpecialtyWithEducationalProgramIds = isset($newWPData->specialtyWithEducationalProgramIds)
					? json_decode($newWPData->specialtyWithEducationalProgramIds, true)
					: [];

				$specialtiesWithEducationalPrograms = [];

				foreach ($rawSpecialtyWithEducationalProgramIds as $item) {
					$key = array_key_first($item);
					$data = $item[$key];

					$specialty = null;
					$educationalPrograms = [];

					if (isset($data['specialtyId'])) {
						$specialty = Capsule::table('special')
							->selectRaw("
										MIN(id) AS id,
										CASE 
											WHEN INSTR(spec, '.') > 0 THEN SUBSTR(spec, 1, INSTR(spec, '.') - 1)
											ELSE spec
										END AS name,
										spec_num_code
									")
							->where('id', $data['specialtyId'])
							->groupBy('name', 'spec_num_code')
							->get()
							->first();
					}

					if (!empty($data['educationalProgramsIds'])) {
						$educationalPrograms = Capsule::table('special')
							->selectRaw("
										MIN(id) AS id,
										TRIM(
											CASE 
												WHEN INSTR(spec, '.') > 0 
												THEN SUBSTR(spec, INSTR(spec, '.') + 1)
												ELSE ''
											END
										) AS name
									")
							->whereIn('id', $data['educationalProgramsIds'])
							->groupBy('name')
							->get();
					}

					$specialtiesWithEducationalProgram = (object)[
						'specialtyName' => $specialty->name,
						'specialtyCode' => $specialty->spec_num_code,
						'educationalPrograms' => $educationalPrograms
					];

					$specialtiesWithEducationalPrograms[] = $specialtiesWithEducationalProgram;
				}

				$newWPData->specialtiesWithEducationalPrograms = $specialtiesWithEducationalPrograms;
			});
		} catch (\Exception $e) {
			return "Duplicating failed: " . $e->getMessage();
		}

		return $newWPData;
	}

	// Функція для отримання всіх даних пов'язаних з курсовим, колоквіумами, видами занять
	public function getLessonsAndExamingsStructure($wpId)
	{
		$wps = DBEducationalDisciplineWorkingProgramModel::with([
			'semesters' => function ($query) {
				$query->with([
					'tasks' => function ($subquery) {
						$subquery->with([
							'taskType',
						]);
					},
					'additionalTasks' => function ($subquery) {
						$subquery->with([
							'taskType',
						]);
					},
					'calculationAndGraphicTypeTask' => function ($subquery) {
						$subquery->with([
							'taskType',
						]);
					},
				]);
			},
			'semesters.modules' => function ($query) {
				$query->with([
					'tasks' => function ($subquery) {
						$subquery->with([
							'taskType',
						]);
					},
					'colloquium' => function ($subquery) {
						$subquery->with([
							'taskType',
						]);
					},
					'controlWork' => function ($subquery) {
						$subquery->with([
							'taskType',
						]);
					},
					'labs',
					'practicals',
					'seminars'
				]);
			}
		])
			->where('id', $wpId)
			->get();

		return $wps->first();
	}

	public function getSemestersAndModules($wpId)
	{
		return DBEducationalDisciplineWorkingProgramModel::with([
			'semesters' => function ($query) {
				$query
					->with([
						'tasks.taskType',
						'additionalTasks.taskType',
						'modules' => function ($subquery) {
							$subquery
								->with([
									'tasks.taskType',
								]);
						}
					]);
			}
		])
			->where('id', $wpId)
			->get()
			->first();
	}

	public function getDataForSelfwork($wpId)
	{
		return DBEducationalDisciplineWorkingProgramModel::select(['id', 'creditsAmount'])
			->with([
				'semesters' => function ($query) {
					$query->select([
						'id',
						'educationalDisciplineWPId',
						'semesterNumber',
						'examTypeId',
					])
						->with([
							'tasks' => function ($subquery) {
								$subquery->with([
									'taskType',
									'educationalFormTaskHours.semesterEducationalForm.educationalForm'
								]);
							},
							'additionalTasks' => function ($subquery) {
								$subquery->with([
									'taskType',
									'educationalFormTaskHours.semesterEducationalForm.educationalForm'
								]);
							},
							'educationalFormLessonSelfworkHours' => function ($subquery) {
								$subquery->with([
									'semesterEducationalForm.educationalForm'
								]);
							},
							'selfworks.educationalFormLessonHours.semesterEducationalForm.educationalForm'
						])
						->orderBy('semesterNumber');
				},
				'semesters.modules' => function ($query) {
					$query->select(['id', 'educationalDisciplineSemesterId'])
						->with([
							'tasks' => function ($subquery) {
								$subquery->with([
									'taskType',
									'educationalFormTaskHours.semesterEducationalForm.educationalForm'
								]);
							},
							'labs',
							'practicals',
							'seminars'
						])
						->orderBy('moduleNumber');
				},
				'semesters.modules.themes' => function ($query) {
					$query->with([
						'lections'
					]);
				},
				'semesters.educationalForms.educationalForm',
				'semesters.examType'
			])
			->where('id', $wpId)
			->get()
			->first();
	}

	public function getWPCreatorIdByWpId($wpId)
	{
		return DBEducationalDisciplineWorkingProgramModel::select(['wpCreatorId'])
			->where('id', $wpId)
			->get()
			->first()
			->wpCreatorId;
	}

	public function getWPCreatorIdBySemesterId($semesterId)
	{
		return DBEducationalDisciplineWorkingProgramModel::with([
			'semesters',
		])
			->select(['wpCreatorId'])
			->whereHas('semesters', function ($query) use (&$semesterId) {
				$query->where('id', $semesterId);
			})
			->get()
			->first()
			->wpCreatorId;
	}

	public function getWPCreatorIdByModuleId($moduleId)
	{
		return DBEducationalDisciplineWorkingProgramModel::with([
			'semesters.modules'
		])
			->select(['wpCreatorId'])
			->whereHas('semesters.modules', function ($query) use ($moduleId) {
				$query->where('id', $moduleId);
			})
			->get()
			->first()
			->wpCreatorId;
	}

	public function getWPCreatorIdByThemeId($themeId)
	{
		return DBEducationalDisciplineWorkingProgramModel::with([
			'semesters.modules.themes'
		])
			->select(['wpCreatorId'])
			->whereHas('semesters.modules.themes', function ($query) use ($themeId) {
				$query->where('id', $themeId);
			})
			->get()
			->first()
			->wpCreatorId;
	}

	public function getWPCreatorIdByLessonId($lessonId)
	{
		return DBEducationalDisciplineWorkingProgramModel::with([
			'semesters.modules.lessons'
		])
			->select(['wpCreatorId'])
			->whereHas('semesters.modules.lessons', function ($query) use ($lessonId) {
				$query->where('id', $lessonId);
			})
			->get()
			->first()
			->wpCreatorId;
	}

	public function getFieldsOfStudyByWpId($wpId)
	{
		return DBEducationalDisciplineWorkingProgramModel::select(['fieldsOfStudyIds'])
			->where('id', $wpId)
			->get()
			->first()
			->fieldsOfStudyIds;
	}

	public function getSemestersLessonsWithEducationalForms($wpId)
	{
		$wps = DBEducationalDisciplineWorkingProgramModel::select(['id'])
			->with([
				'semesters.educationalForms.educationalForm',
				'semesters' => function ($q) {
					$q->orderBy('semesterNumber')
						->with([
							'modules' => function ($query) {
								$query->orderBy('moduleNumber')
									->with([
										'themes' => function ($subquery) {
											$subquery->orderBy('themeNumber')
												->with([
													'lections' => function ($sbq) {
														$sbq->orderBy('lessonNumber')
															->with([
																'educationalFormLessonHours.semesterEducationalForm.educationalForm'
															]);
													}
												]);
										},
										'labs' => function ($subquery) {
											$subquery->orderBy('lessonNumber')
												->with([
													'educationalFormLessonHours.semesterEducationalForm.educationalForm',
												]);
										},
										'practicals' => function ($subquery) {
											$subquery->orderBy('lessonNumber')
												->with([
													'educationalFormLessonHours.semesterEducationalForm.educationalForm',
												]);
										},
										'seminars' => function ($subquery) {
											$subquery->orderBy('lessonNumber')
												->with([
													'educationalFormLessonHours.semesterEducationalForm.educationalForm',
												]);
										},
									]);
							}
						]);
				},


				// 'semesters.modules.themes.lections' => function ($query) {
				// 	$query->orderBy('themeNumber')
				// 		->with([
				// 			'lections.educationalFormLessonHours.semesterEducationalForm.educationalForm'
				// 		]);
				// },
				// 'semesters.modules.labs' => function ($query) {
				// 	$query->orderBy('lessonNumber')
				// 		->with([
				// 			'educationalFormLessonHours.semesterEducationalForm.educationalForm',
				// 		]);
				// },
				// 'semesters.modules.practicals' => function ($query) {
				// 	$query->orderBy('lessonNumber')
				// 		->with([
				// 			'educationalFormLessonHours.semesterEducationalForm.educationalForm'
				// 		]);
				// },
				// 'semesters.modules.seminars' => function ($query) {
				// 	$query->orderBy('lessonNumber')
				// 		->with([
				// 			'educationalFormLessonHours.semesterEducationalForm.educationalForm'
				// 		]);
				// },



				// 'semesters.modules.themes.lections.educationalFormLessonHours.semesterEducationalForm.educationalForm',
				// 'semesters.modules.labs.educationalFormLessonHours.semesterEducationalForm.educationalForm',
				// 'semesters.modules.practicals.educationalFormLessonHours.semesterEducationalForm.educationalForm',
				// 'semesters.modules.seminars.educationalFormLessonHours.semesterEducationalForm.educationalForm'
			])
			->where('id', $wpId)
			->get();

		return $wps->first();
	}
}
