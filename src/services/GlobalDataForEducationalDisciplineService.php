<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class GlobalDataForEducationalDisciplineService
{
	public function createNewDataForEducationalDiscipline($wpId, $globalWPData)
	{
		return Capsule::table('globalDataForEducationalDiscipline')->insertGetId([
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

	public function updateGlobalWPDataForEducationalDiscipline($wpId, $field, $value)
	{
		$data = Capsule::table('globalDataForEducationalDiscipline')->where('educationalDisciplineWorkingProgramId', $wpId)->first();

		if (!$data) {
			echo json_encode(['status' => 'error', 'message' => 'Global data not found']);
			return;
		}

		$updated = Capsule::table('globalDataForEducationalDiscipline')
			->where('educationalDisciplineWorkingProgramId', $wpId)
			->update([$field => $value]);

		if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'Global data updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}
}
