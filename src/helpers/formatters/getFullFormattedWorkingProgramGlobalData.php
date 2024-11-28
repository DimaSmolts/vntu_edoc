<?php

require_once __DIR__ . '/../../models/AssessmentCriteriaModel.php';
require_once __DIR__ . '/../../models/WorkingProgramGlobalDataOverwriteModel.php';

use App\Models\AssessmentCriteriaModel;
use App\Models\WorkingProgramGlobalDataOverwriteModel;

function getFullFormattedWorkingProgramGlobalData($globalWPData)
{
	$generalAssessmentCriteria = isset($globalWPData) ? new AssessmentCriteriaModel(
		$globalWPData->generalAssessmentCriteriaForA,
		$globalWPData->generalAssessmentCriteriaForB,
		$globalWPData->generalAssessmentCriteriaForC,
		$globalWPData->generalAssessmentCriteriaForD,
		$globalWPData->generalAssessmentCriteriaForE,
		$globalWPData->generalAssessmentCriteriaForFX,
		$globalWPData->generalAssessmentCriteriaForF,
	) : null;

	$lessonAssessmentCriteria = isset($globalWPData) ? new AssessmentCriteriaModel(
		$globalWPData->lessonAssessmentCriteriaForA,
		$globalWPData->lessonAssessmentCriteriaForB,
		$globalWPData->lessonAssessmentCriteriaForC,
		$globalWPData->lessonAssessmentCriteriaForD,
		$globalWPData->lessonAssessmentCriteriaForE,
		$globalWPData->lessonAssessmentCriteriaForFX,
		$globalWPData->lessonAssessmentCriteriaForF,
	) : null;

	$courseworkAssessmentCriteria = isset($globalWPData) ? new AssessmentCriteriaModel(
		$globalWPData->courseworkAssessmentCriteriaForA,
		$globalWPData->courseworkAssessmentCriteriaForB,
		$globalWPData->courseworkAssessmentCriteriaForC,
		$globalWPData->courseworkAssessmentCriteriaForD,
		$globalWPData->courseworkAssessmentCriteriaForE,
		$globalWPData->courseworkAssessmentCriteriaForFX,
		$globalWPData->courseworkAssessmentCriteriaForF,
	) : null;

	$examAssessmentCriteria = isset($globalWPData) ? new AssessmentCriteriaModel(
		$globalWPData->examAssessmentCriteriaForA,
		$globalWPData->examAssessmentCriteriaForB,
		$globalWPData->examAssessmentCriteriaForC,
		$globalWPData->examAssessmentCriteriaForD,
		$globalWPData->examAssessmentCriteriaForE,
		$globalWPData->examAssessmentCriteriaForFX,
		$globalWPData->examAssessmentCriteriaForF,
	) : null;

	return new WorkingProgramGlobalDataOverwriteModel(
		isset($globalWPData) ? $globalWPData->universityName : '',
		isset($globalWPData) ? $globalWPData->universityShortName : '',
		isset($globalWPData) ? $globalWPData->academicRightsAndResponsibilities : '',
		$generalAssessmentCriteria,
		$lessonAssessmentCriteria,
		$courseworkAssessmentCriteria,
		$examAssessmentCriteria,
	);
};
