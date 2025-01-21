<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class AssessmentCriteriaService
{
	public function getDefaultAssessmentCriterias()
	{
		return Capsule::table('assessmentCriterias')
			->where('educationalDisciplineWPId', null)
			->get();
	}

	public function getGeneralAssessmentCriteria()
	{
		return Capsule::table('assessmentCriterias')
			->where('educationalDisciplineWPId', null)
			->where('lessonTypeId', null)
			->where('taskTypeId', null)
			->where('isGeneral', true)
			->get()
			->first();
	}

	public function getAssessmentCriteriaByLessonType($lessonTypeId)
	{
		return Capsule::table('assessmentCriterias')
			->where('educationalDisciplineWPId', null)
			->where('lessonTypeId', $lessonTypeId)
			->where('taskTypeId', null)
			->get()
			->first();
	}

	public function getAssessmentCriteriaByTaskType($taskTypeId)
	{
		return Capsule::table('assessmentCriterias')
			->where('educationalDisciplineWPId', null)
			->where('lessonTypeId', null)
			->where('taskTypeId', $taskTypeId)
			->get()
			->first();
	}

	public function getAssessmentCriteriaForAdditionalTask()
	{
		return Capsule::table('assessmentCriterias')
			->where('educationalDisciplineWPId', null)
			->where('lessonTypeId', null)
			->where('taskTypeId', null)
			->where('isAdditionalTask', true)
			->get()
			->first();
	}

	public function getAssessmentCriteriaByWPIdAndLessonType($wpId, $lessonTypeId)
	{
		return Capsule::table('assessmentCriterias')
			->where('educationalDisciplineWPId', $wpId)
			->where('lessonTypeId', $lessonTypeId)
			->where('taskTypeId', null)
			->get()
			->first();
	}

	public function copyAssessmentCriteria($wpId, $oldAssessmentCriteria, $additionalTaskTypeId = null)
	{
		$oldAssessmentCriteria = (array)$oldAssessmentCriteria; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
		unset($oldAssessmentCriteria['id']); // Видаляємо з скопійованих даних id
		unset($oldAssessmentCriteria['educationalDisciplineWPId']); // Видаляємо з скопійованих даних id початкової робочої програми
		$oldAssessmentCriteria['educationalDisciplineWPId'] = $wpId; // Вставляємо id нової робочої програми

		if ($additionalTaskTypeId) {
			unset($oldAssessmentCriteria['taskTypeId']); // Видаляємо з скопійованих даних id типу завдання
			$oldAssessmentCriteria['taskTypeId'] = $additionalTaskTypeId; // Вставляємо id типу завдання
		}

		// Створюємо новий запис глобальних даних
		Capsule::table('assessmentCriterias')->insertGetId($oldAssessmentCriteria);
	}

	public function updateAssessmentCriteria($wpId, $field, $value, $lessonTypeId, $taskTypeId)
	{
		Capsule::table('assessmentCriterias')
			->updateOrInsert(
				[
					'educationalDisciplineWPId' => $wpId,
					'lessonTypeId' => $lessonTypeId,
					'taskTypeId' => $taskTypeId
				],
				[
					$field => $value
				]
			);
	}

	public function updateGeneralAssessmentCriteria($field, $value)
	{
		Capsule::table('assessmentCriterias')
			->updateOrInsert(
				[
					'educationalDisciplineWPId' => null,
					'lessonTypeId' => null,
					'taskTypeId' => null,
					'isGeneral' => true,
				],
				[
					$field => $value
				]
			);
	}

	public function updateAdditionalTaskAssessmentCriteria($field, $value)
	{
		Capsule::table('assessmentCriterias')
			->updateOrInsert(
				[
					'educationalDisciplineWPId' => null,
					'lessonTypeId' => null,
					'taskTypeId' => null,
					'isGeneral' => null,
					'isAdditionalTask' => true,
				],
				[
					$field => $value
				]
			);
	}

	public function deleteAssessmentCriteriaByLessonType($wpId, $lessonTypeId)
	{
		// Use Capsule to delete the theme by ID
		Capsule::table('assessmentCriterias')
			->where('educationalDisciplineWPId', $wpId)
			->where('lessonTypeId', $lessonTypeId)
			->delete();
	}

	public function deleteAssessmentCriteriaByTaskType($wpId, $taskTypeId)
	{
		// Use Capsule to delete the theme by ID
		Capsule::table('assessmentCriterias')
			->where('educationalDisciplineWPId', $wpId)
			->where('taskTypeId', $taskTypeId)
			->delete();
	}
}
