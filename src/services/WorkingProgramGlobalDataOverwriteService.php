<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class WorkingProgramGlobalDataOverwriteService
{
	// Функція для отримання дефолтних глобальних даних
	public function getWorkingProgramGlobalData()
	{
		return Capsule::table('workingProgramGlobalDataOverwrite')
			->where('id', 1)
			->first();
	}

	// Функція для створення запису з дефолтними значеннями для певної робочої програми
	public function createNewWorkingProgramGlobalDataOverwrite($wpId, $globalWPData)
	{
		return Capsule::table('workingProgramGlobalDataOverwrite')->insertGetId([
			'educationalDisciplineWorkingProgramId' => $wpId,
			'universityName' => $globalWPData->universityName,
			'universityShortName' => $globalWPData->universityShortName,
			'academicRightsAndResponsibilities' => $globalWPData->academicRightsAndResponsibilities,
			'generalAssessmentCriteriaForA' => $globalWPData->generalAssessmentCriteria->A,
			'generalAssessmentCriteriaForB' => $globalWPData->generalAssessmentCriteria->B,
			'generalAssessmentCriteriaForC' => $globalWPData->generalAssessmentCriteria->C,
			'generalAssessmentCriteriaForD' => $globalWPData->generalAssessmentCriteria->D,
			'generalAssessmentCriteriaForE' => $globalWPData->generalAssessmentCriteria->E,
			'generalAssessmentCriteriaForFX' => $globalWPData->generalAssessmentCriteria->FX,
			'generalAssessmentCriteriaForF' => $globalWPData->generalAssessmentCriteria->F,
			'practicalAssessmentCriteriaForA' => $globalWPData->practicalAssessmentCriteria->A,
			'practicalAssessmentCriteriaForB' => $globalWPData->practicalAssessmentCriteria->B,
			'practicalAssessmentCriteriaForC' => $globalWPData->practicalAssessmentCriteria->C,
			'practicalAssessmentCriteriaForD' => $globalWPData->practicalAssessmentCriteria->D,
			'practicalAssessmentCriteriaForE' => $globalWPData->practicalAssessmentCriteria->E,
			'practicalAssessmentCriteriaForFXAndF' => $globalWPData->practicalAssessmentCriteria->FXAndF,
			'labAssessmentCriteriaForA' => $globalWPData->labAssessmentCriteria->A,
			'labAssessmentCriteriaForB' => $globalWPData->labAssessmentCriteria->B,
			'labAssessmentCriteriaForC' => $globalWPData->labAssessmentCriteria->C,
			'labAssessmentCriteriaForD' => $globalWPData->labAssessmentCriteria->D,
			'labAssessmentCriteriaForE' => $globalWPData->labAssessmentCriteria->E,
			'labAssessmentCriteriaForFXAndF' => $globalWPData->labAssessmentCriteria->FXAndF,
			'seminarAssessmentCriteriaForA' => $globalWPData->seminarAssessmentCriteria->A,
			'seminarAssessmentCriteriaForB' => $globalWPData->seminarAssessmentCriteria->B,
			'seminarAssessmentCriteriaForC' => $globalWPData->seminarAssessmentCriteria->C,
			'seminarAssessmentCriteriaForD' => $globalWPData->seminarAssessmentCriteria->D,
			'seminarAssessmentCriteriaForE' => $globalWPData->seminarAssessmentCriteria->E,
			'seminarAssessmentCriteriaForFXAndF' => $globalWPData->seminarAssessmentCriteria->FXAndF,
			'courseworkAssessmentCriteriaForA' => $globalWPData->courseworkAssessmentCriteria->A,
			'courseworkAssessmentCriteriaForB' => $globalWPData->courseworkAssessmentCriteria->B,
			'courseworkAssessmentCriteriaForC' => $globalWPData->courseworkAssessmentCriteria->C,
			'courseworkAssessmentCriteriaForD' => $globalWPData->courseworkAssessmentCriteria->D,
			'courseworkAssessmentCriteriaForE' => $globalWPData->courseworkAssessmentCriteria->E,
			'courseworkAssessmentCriteriaForFXAndF' => $globalWPData->courseworkAssessmentCriteria->FXAndF,
			'colloquiumAssessmentCriteriaForA' => $globalWPData->colloquiumAssessmentCriteria->A,
			'colloquiumAssessmentCriteriaForB' => $globalWPData->colloquiumAssessmentCriteria->B,
			'colloquiumAssessmentCriteriaForC' => $globalWPData->colloquiumAssessmentCriteria->C,
			'colloquiumAssessmentCriteriaForD' => $globalWPData->colloquiumAssessmentCriteria->D,
			'colloquiumAssessmentCriteriaForE' => $globalWPData->colloquiumAssessmentCriteria->E,
			'colloquiumAssessmentCriteriaForFXAndF' => $globalWPData->colloquiumAssessmentCriteria->FXAndF,
		]);
	}

	// Функція оновлення глобальних даних для адміна
	public function updateGlobalData($field, $value)
	{
		Capsule::table('workingProgramGlobalDataOverwrite')
			// Додаємо новий запис або оновлюємо запис глобальних даних
			->updateOrInsert(
				['id' => 1],
				[
					$field => $value
				]
			);
	}

	// Функція для отримання глобальних даних певної робочої програми
	public function getGlobalDataByWPId($wpId)
	{
		return Capsule::table('workingProgramGlobalDataOverwrite')
			->where('educationalDisciplineWorkingProgramId', $wpId)
			->first();
	}

	// Функція для зміни дефолтних даних на рівні робочої програми
	public function updateWorkingProgramGlobalDataOverwrite($wpId, $field, $value)
	{
		$globalData = Capsule::table('workingProgramGlobalDataOverwrite')->where('id', 1)->first(); // перевіряємо чи є глобальні дані в таблиці

		// Якщо глобальних даних немає, то просимо, щоб адміністратор заповнив їх спочатку, для того щоб його запис мав id 1
		if (!$globalData) {
			echo json_encode(['status' => 'error', 'message' => 'Admin should insert global data first!']);
			return;
		}

		$data = Capsule::table('workingProgramGlobalDataOverwrite')->where('educationalDisciplineWorkingProgramId', $wpId)->first(); // перевіряємо чи запис з дефолтними даними існує

		if (!$data) {
			echo json_encode(['status' => 'error', 'message' => 'Global data not found']);
			return;
		}

		// оновлюємо запис з дефолтними даними
		$updated = Capsule::table('workingProgramGlobalDataOverwrite')
			->where('educationalDisciplineWorkingProgramId', $wpId)
			->update([$field => $value]);

		if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'Global data updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}
}
