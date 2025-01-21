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
		$globalWPData->generalAssessmentCriteriaForFX ?? '',
		$globalWPData->generalAssessmentCriteriaForF ?? '',
		$globalWPData->generalAssessmentCriteriaForFXAndF ?? '',
	) : null;

	$practicalAssessmentCriteria = isset($globalWPData) ? new AssessmentCriteriaModel(
		$globalWPData->practicalAssessmentCriteriaForA,
		$globalWPData->practicalAssessmentCriteriaForB,
		$globalWPData->practicalAssessmentCriteriaForC,
		$globalWPData->practicalAssessmentCriteriaForD,
		$globalWPData->practicalAssessmentCriteriaForE,
		$globalWPData->practicalAssessmentCriteriaForFX ?? '',
		$globalWPData->practicalAssessmentCriteriaForF ?? '',
		$globalWPData->practicalAssessmentCriteriaForFXAndF ?? '',
	) : null;

	$labAssessmentCriteria = isset($globalWPData) ? new AssessmentCriteriaModel(
		$globalWPData->labAssessmentCriteriaForA,
		$globalWPData->labAssessmentCriteriaForB,
		$globalWPData->labAssessmentCriteriaForC,
		$globalWPData->labAssessmentCriteriaForD,
		$globalWPData->labAssessmentCriteriaForE,
		$globalWPData->labAssessmentCriteriaForFX ?? '',
		$globalWPData->labAssessmentCriteriaForF ?? '',
		$globalWPData->labAssessmentCriteriaForFXAndF ?? '',
	) : null;

	$seminarAssessmentCriteria = isset($globalWPData) ? new AssessmentCriteriaModel(
		$globalWPData->seminarAssessmentCriteriaForA,
		$globalWPData->seminarAssessmentCriteriaForB,
		$globalWPData->seminarAssessmentCriteriaForC,
		$globalWPData->seminarAssessmentCriteriaForD,
		$globalWPData->seminarAssessmentCriteriaForE,
		$globalWPData->seminarAssessmentCriteriaForFX ?? '',
		$globalWPData->seminarAssessmentCriteriaForF ?? '',
		$globalWPData->seminarAssessmentCriteriaForFXAndF ?? '',
	) : null;

	$courseworkAssessmentCriteria = isset($globalWPData) ? new AssessmentCriteriaModel(
		$globalWPData->courseworkAssessmentCriteriaForA,
		$globalWPData->courseworkAssessmentCriteriaForB,
		$globalWPData->courseworkAssessmentCriteriaForC,
		$globalWPData->courseworkAssessmentCriteriaForD,
		$globalWPData->courseworkAssessmentCriteriaForE,
		$globalWPData->courseworkAssessmentCriteriaForFX ?? '',
		$globalWPData->courseworkAssessmentCriteriaForF ?? '',
		$globalWPData->courseworkAssessmentCriteriaForFXAndF ?? '',
	) : null;

	$colloquiumAssessmentCriteria = isset($globalWPData) ? new AssessmentCriteriaModel(
		$globalWPData->colloquiumAssessmentCriteriaForA,
		$globalWPData->colloquiumAssessmentCriteriaForB,
		$globalWPData->colloquiumAssessmentCriteriaForC,
		$globalWPData->colloquiumAssessmentCriteriaForD,
		$globalWPData->colloquiumAssessmentCriteriaForE,
		$globalWPData->colloquiumAssessmentCriteriaForFX ?? '',
		$globalWPData->colloquiumAssessmentCriteriaForF ?? '',
		$globalWPData->colloquiumAssessmentCriteriaForFXAndF ?? '',
	) : null;

	$controlWorkAssessmentCriteria = isset($globalWPData) ? new AssessmentCriteriaModel(
		$globalWPData->controlWorkAssessmentCriteriaForA,
		$globalWPData->controlWorkAssessmentCriteriaForB,
		$globalWPData->controlWorkAssessmentCriteriaForC,
		$globalWPData->controlWorkAssessmentCriteriaForD,
		$globalWPData->controlWorkAssessmentCriteriaForE,
		$globalWPData->controlWorkAssessmentCriteriaForFX ?? '',
		$globalWPData->controlWorkAssessmentCriteriaForF ?? '',
		$globalWPData->controlWorkAssessmentCriteriaForFXAndF ?? '',
	) : null;

	return new WorkingProgramGlobalDataOverwriteModel(
		isset($globalWPData) ? $globalWPData->universityName : '',
		isset($globalWPData) ? $globalWPData->universityShortName : '',
		isset($globalWPData) ? $globalWPData->academicRightsAndResponsibilities : '',
		$generalAssessmentCriteria,
		$practicalAssessmentCriteria,
		$labAssessmentCriteria,
		$seminarAssessmentCriteria,
		$courseworkAssessmentCriteria,
		$colloquiumAssessmentCriteria,
		$controlWorkAssessmentCriteria,
	);
};
