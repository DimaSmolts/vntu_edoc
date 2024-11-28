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
			'generalAssessmentCriteriaForA' => $globalWPData->generalAssessmentCriteriaForA,
			'generalAssessmentCriteriaForB' => $globalWPData->generalAssessmentCriteriaForB,
			'generalAssessmentCriteriaForC' => $globalWPData->generalAssessmentCriteriaForC,
			'generalAssessmentCriteriaForD' => $globalWPData->generalAssessmentCriteriaForD,
			'generalAssessmentCriteriaForE' => $globalWPData->generalAssessmentCriteriaForE,
			'generalAssessmentCriteriaForFX' => $globalWPData->generalAssessmentCriteriaForFX,
			'generalAssessmentCriteriaForF' => $globalWPData->generalAssessmentCriteriaForF,
			'lessonAssessmentCriteriaForA' => $globalWPData->lessonAssessmentCriteriaForA,
			'lessonAssessmentCriteriaForB' => $globalWPData->lessonAssessmentCriteriaForB,
			'lessonAssessmentCriteriaForC' => $globalWPData->lessonAssessmentCriteriaForC,
			'lessonAssessmentCriteriaForD' => $globalWPData->lessonAssessmentCriteriaForD,
			'lessonAssessmentCriteriaForE' => $globalWPData->lessonAssessmentCriteriaForE,
			'lessonAssessmentCriteriaForFX' => $globalWPData->lessonAssessmentCriteriaForFX,
			'lessonAssessmentCriteriaForF' => $globalWPData->lessonAssessmentCriteriaForF,
			'courseworkAssessmentCriteriaForA' => $globalWPData->courseworkAssessmentCriteriaForA,
			'courseworkAssessmentCriteriaForB' => $globalWPData->courseworkAssessmentCriteriaForB,
			'courseworkAssessmentCriteriaForC' => $globalWPData->courseworkAssessmentCriteriaForC,
			'courseworkAssessmentCriteriaForD' => $globalWPData->courseworkAssessmentCriteriaForD,
			'courseworkAssessmentCriteriaForE' => $globalWPData->courseworkAssessmentCriteriaForE,
			'courseworkAssessmentCriteriaForFX' => $globalWPData->courseworkAssessmentCriteriaForFX,
			'courseworkAssessmentCriteriaForF' => $globalWPData->courseworkAssessmentCriteriaForF,
			'examAssessmentCriteriaForA' => $globalWPData->examAssessmentCriteriaForA,
			'examAssessmentCriteriaForB' => $globalWPData->examAssessmentCriteriaForB,
			'examAssessmentCriteriaForC' => $globalWPData->examAssessmentCriteriaForC,
			'examAssessmentCriteriaForD' => $globalWPData->examAssessmentCriteriaForD,
			'examAssessmentCriteriaForE' => $globalWPData->examAssessmentCriteriaForE,
			'examAssessmentCriteriaForFX' => $globalWPData->examAssessmentCriteriaForFX,
			'examAssessmentCriteriaForF' => $globalWPData->examAssessmentCriteriaForF,
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
