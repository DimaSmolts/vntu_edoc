<?php

namespace App\Services;

require_once __DIR__ . '/../models/DBEducationalDisciplineWorkingProgramModel.php';

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
			->select(['id', 'disciplineName', 'specialtyIds', 'createdAt', 'wpCreatorId'])
			->where('wpCreatorId', $wpCreatorId)
			->orderBy('createdAt')
			->get();

		if (!empty($workingPrograms)) {
			foreach ($workingPrograms as $workingProgram) {
				$specialtyIds = json_decode($workingProgram->specialtyIds ?? '[]', true);

				if (!empty($specialtyIds)) {
					$specialties = Capsule::table('special')
						->selectRaw("
							MIN(id) AS id,
							CASE 
								WHEN INSTR(spec, '.') > 0 THEN SUBSTR(spec, 1, INSTR(spec, '.') - 1)
								ELSE spec
							END AS name,
							spec_num_code
						")
						->whereIn('id', $specialtyIds)
						->groupBy('name', 'spec_num_code')
						->get();

					$specialtiesCodesAndNames = $specialties->map(function ($specialty) {
						return (object)[
							'name' => $specialty->name,
							'code' => $specialty->spec_num_code
						];
					})->toArray();

					$workingProgram->specialtiesCodesAndNames = $specialtiesCodesAndNames;
				} else {
					$workingProgram->specialtiesCodesAndNames = [];
				}
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
						}
					])
					->orderBy('moduleNumber');
			},
			'semesters.modules.themes' => function ($query) {
				$query
					->with([
						'lections',
						'labs',
						'practicals',
						'seminars'
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
			'globalData',
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
						'selfworks.educationalFormLessonHours.semesterEducationalForm.educationalForm'
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
						'lections.educationalFormLessonHours.semesterEducationalForm.educationalForm',
						'labs.educationalFormLessonHours.semesterEducationalForm.educationalForm',
						'practicals.educationalFormLessonHours.semesterEducationalForm.educationalForm',
						'seminars.educationalFormLessonHours.semesterEducationalForm.educationalForm'
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
			'globalData',
			'literature',
			'faculty',
			'department',
			'stydingLevel'
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

		$specialtyIds = json_decode($wp->specialtyIds ?? '[]', true);

		if (!empty($specialtyIds)) {
			$specialties = Capsule::table('special')
				->selectRaw("
					MIN(id) AS id,
					CASE 
						WHEN INSTR(spec, '.') > 0 THEN SUBSTR(spec, 1, INSTR(spec, '.') - 1)
						ELSE spec
					END AS name,
					spec_num_code
				")
				->whereIn('id', $specialtyIds)
				->groupBy('name', 'spec_num_code')
				->get();

			$wp->specialties = $specialties;
		} else {
			$wp->specialties = collect();
		}

		$educationalProgramIds = json_decode($wp->educationalProgramIds ?? '[]', true);

		if (!empty($educationalProgramIds)) {
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
				->whereIn('id', $educationalProgramIds)
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
		try {
			// Починаємо транзакцію, щоб відмінити всі зміни, якщо трапиться помилка посеред процесу дублювання 
			Capsule::transaction(function () use ($wpId, &$newWPData) {
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

				// Дістаємо глобальні значення для даної робочої програми
				$oldWorkingProgramGlobalDataOverwriteData = Capsule::table('workingProgramGlobalDataOverwrite')
					->where('educationalDisciplineWorkingProgramId', $wpId)
					->first();

				$oldWorkingProgramGlobalDataOverwriteData = (array)$oldWorkingProgramGlobalDataOverwriteData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
				unset($oldWorkingProgramGlobalDataOverwriteData['id']); // Видаляємо з скопійованих даних id
				unset($oldWorkingProgramGlobalDataOverwriteData['educationalDisciplineWorkingProgramId']); // Видаляємо з скопійованих даних id старої робочої програми
				$oldWorkingProgramGlobalDataOverwriteData['educationalDisciplineWorkingProgramId'] = $newWPId; // Вставляємо id нової робочої програми

				// Створюємо новий запис глобальних даних
				Capsule::table('workingProgramGlobalDataOverwrite')->insertGetId($oldWorkingProgramGlobalDataOverwriteData);

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

							// Дістаємо всі уроки для даної теми
							$oldLessonsData = Capsule::table('lessons')
								->where('themeId', $oldThemeId)
								->get();

							// Перебираємо всі уроки
							foreach ($oldLessonsData as $oldLessonData) {
								$oldLessonData = (array)$oldLessonData; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
								$oldLessonId = $oldLessonData['id']; // Зберігаємо id старого уроку

								unset($oldLessonData['id']); // Видаляємо з скопійованих даних id
								unset($oldLessonData['themeId']); // Видаляємо з скопійованих даних id теми
								$oldLessonData['themeId'] = $newThemeId; // Вставляємо id нової теми

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
						}
					}
				}
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
					}
				]);
			},
			'semesters.modules.themes' => function ($query) {
				$query->with([
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
							}
						])
						->orderBy('moduleNumber');
				},
				'semesters.modules.themes' => function ($query) {
					$query->with([
						'lections',
						'labs',
						'practicals',
						'seminars'
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
			'semesters.modules.themes.lessons'
		])
			->select(['wpCreatorId'])
			->whereHas('semesters.modules.themes.lessons', function ($query) use ($lessonId) {
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
}
