<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class AssessmentCriteriaService
{
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
			->where('isGeneral', false)
			->get()
			->first();
	}

	public function getAssessmentCriteriaByTaskType($taskTypeId)
	{
		return Capsule::table('assessmentCriterias')
			->where('educationalDisciplineWPId', null)
			->where('lessonTypeId', null)
			->where('taskTypeId', $taskTypeId)
			->where('isGeneral', false)
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

	public function copyAssessmentCriteria($wpId, $oldAssessmentCriteria)
	{
		$oldAssessmentCriteria = (array)$oldAssessmentCriteria; // Конвертуємо скопійовані дані в масив для полегшення роботи з ними
		unset($oldAssessmentCriteria['id']); // Видаляємо з скопійованих даних id
		unset($oldAssessmentCriteria['educationalDisciplineWPId']); // Видаляємо з скопійованих даних id початкової робочої програми
		$oldAssessmentCriteria['educationalDisciplineWPId'] = $wpId; // Вставляємо id нової робочої програми

		// Створюємо новий запис глобальних даних
		Capsule::table('assessmentCriterias')->insertGetId($oldAssessmentCriteria);
	}

	// Функція для зміни дефолтних даних на рівні робочої програми
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
}
