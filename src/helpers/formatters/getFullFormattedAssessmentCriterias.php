<?php

require_once __DIR__ . '/../../models/AssessmentCriteriaModel.php';
require_once __DIR__ . '/../../models/WorkingProgramGlobalDataModel.php';

use App\Models\AssessmentCriteriaModel;

function getFullFormattedAssessmentCriterias($workingProgramData)
{
	$generalAssessmentCriteria = isset($workingProgramData->generalAssessmentCriteria) ? new AssessmentCriteriaModel(
		$workingProgramData->generalAssessmentCriteria->A,
		$workingProgramData->generalAssessmentCriteria->B,
		$workingProgramData->generalAssessmentCriteria->C,
		$workingProgramData->generalAssessmentCriteria->D,
		$workingProgramData->generalAssessmentCriteria->E,
		$workingProgramData->generalAssessmentCriteria->FX ?? '',
		$workingProgramData->generalAssessmentCriteria->F ?? '',
		$workingProgramData->generalAssessmentCriteria->FXAndF ?? '',
	) : null;

	$practicalAssessmentCriteria = isset($workingProgramData->practicalAssessmentCriteria) ? new AssessmentCriteriaModel(
		$workingProgramData->practicalAssessmentCriteria->A,
		$workingProgramData->practicalAssessmentCriteria->B,
		$workingProgramData->practicalAssessmentCriteria->C,
		$workingProgramData->practicalAssessmentCriteria->D,
		$workingProgramData->practicalAssessmentCriteria->E,
		$workingProgramData->practicalAssessmentCriteria->FX ?? '',
		$workingProgramData->practicalAssessmentCriteria->F ?? '',
		$workingProgramData->practicalAssessmentCriteria->FXAndF ?? '',
		null,
		$workingProgramData->practicalAssessmentCriteria->practical->id ?? '',
		null,
	) : null;

	$labAssessmentCriteria = isset($workingProgramData->laboratoryAssessmentCriteria) ? new AssessmentCriteriaModel(
		$workingProgramData->laboratoryAssessmentCriteria->A,
		$workingProgramData->laboratoryAssessmentCriteria->B,
		$workingProgramData->laboratoryAssessmentCriteria->C,
		$workingProgramData->laboratoryAssessmentCriteria->D,
		$workingProgramData->laboratoryAssessmentCriteria->E,
		$workingProgramData->laboratoryAssessmentCriteria->FX ?? '',
		$workingProgramData->laboratoryAssessmentCriteria->F ?? '',
		$workingProgramData->laboratoryAssessmentCriteria->FXAndF ?? '',
		null,
		$workingProgramData->laboratoryAssessmentCriteria->laboratory->id ?? '',
		null,
	) : null;

	$seminarAssessmentCriteria = isset($workingProgramData->seminarAssessmentCriteria) ? new AssessmentCriteriaModel(
		$workingProgramData->seminarAssessmentCriteria->A,
		$workingProgramData->seminarAssessmentCriteria->B,
		$workingProgramData->seminarAssessmentCriteria->C,
		$workingProgramData->seminarAssessmentCriteria->D,
		$workingProgramData->seminarAssessmentCriteria->E,
		$workingProgramData->seminarAssessmentCriteria->FX ?? '',
		$workingProgramData->seminarAssessmentCriteria->F ?? '',
		$workingProgramData->seminarAssessmentCriteria->FXAndF ?? '',
		null,
		$workingProgramData->seminarAssessmentCriteria->seminar->id ?? '',
		null,
	) : null;

	$courseworkAssessmentCriteria = isset($workingProgramData->courseworkAssessmentCriteria) ? new AssessmentCriteriaModel(
		$workingProgramData->courseworkAssessmentCriteria->A,
		$workingProgramData->courseworkAssessmentCriteria->B,
		$workingProgramData->courseworkAssessmentCriteria->C,
		$workingProgramData->courseworkAssessmentCriteria->D,
		$workingProgramData->courseworkAssessmentCriteria->E,
		$workingProgramData->courseworkAssessmentCriteria->FX ?? '',
		$workingProgramData->courseworkAssessmentCriteria->F ?? '',
		$workingProgramData->courseworkAssessmentCriteria->FXAndF ?? '',
		null,
		null,
		$workingProgramData->courseworkAssessmentCriteria->coursework->id ?? ''
	) : null;

	$courseProjectAssessmentCriteria = isset($workingProgramData->courseProjectAssessmentCriteria) ? new AssessmentCriteriaModel(
		$workingProgramData->courseProjectAssessmentCriteria->A,
		$workingProgramData->courseProjectAssessmentCriteria->B,
		$workingProgramData->courseProjectAssessmentCriteria->C,
		$workingProgramData->courseProjectAssessmentCriteria->D,
		$workingProgramData->courseProjectAssessmentCriteria->E,
		$workingProgramData->courseProjectAssessmentCriteria->FX ?? '',
		$workingProgramData->courseProjectAssessmentCriteria->F ?? '',
		$workingProgramData->courseProjectAssessmentCriteria->FXAndF ?? '',
		null,
		null,
		$workingProgramData->courseProjectAssessmentCriteria->courseProject->id ?? ''
	) : null;

	$calculationAndGraphicWorkAssessmentCriteria = isset($workingProgramData->calculationAndGraphicWorkAssessmentCriteria) ? new AssessmentCriteriaModel(
		$workingProgramData->calculationAndGraphicWorkAssessmentCriteria->A,
		$workingProgramData->calculationAndGraphicWorkAssessmentCriteria->B,
		$workingProgramData->calculationAndGraphicWorkAssessmentCriteria->C,
		$workingProgramData->calculationAndGraphicWorkAssessmentCriteria->D,
		$workingProgramData->calculationAndGraphicWorkAssessmentCriteria->E,
		$workingProgramData->calculationAndGraphicWorkAssessmentCriteria->FX ?? '',
		$workingProgramData->calculationAndGraphicWorkAssessmentCriteria->F ?? '',
		$workingProgramData->calculationAndGraphicWorkAssessmentCriteria->FXAndF ?? '',
		null,
		null,
		$workingProgramData->calculationAndGraphicWorkAssessmentCriteria->calculationAndGraphicWork->id ?? ''
	) : null;

	$calculationAndGraphicTaskAssessmentCriteria = isset($workingProgramData->calculationAndGraphicTaskAssessmentCriteria) ? new AssessmentCriteriaModel(
		$workingProgramData->calculationAndGraphicTaskAssessmentCriteria->A,
		$workingProgramData->calculationAndGraphicTaskAssessmentCriteria->B,
		$workingProgramData->calculationAndGraphicTaskAssessmentCriteria->C,
		$workingProgramData->calculationAndGraphicTaskAssessmentCriteria->D,
		$workingProgramData->calculationAndGraphicTaskAssessmentCriteria->E,
		$workingProgramData->calculationAndGraphicTaskAssessmentCriteria->FX ?? '',
		$workingProgramData->calculationAndGraphicTaskAssessmentCriteria->F ?? '',
		$workingProgramData->calculationAndGraphicTaskAssessmentCriteria->FXAndF ?? '',
		null,
		null,
		$workingProgramData->calculationAndGraphicTaskAssessmentCriteria->calculationAndGraphicTask->id ?? ''
	) : null;

	$colloquiumAssessmentCriteria = isset($workingProgramData->colloquiumAssessmentCriteria) ? new AssessmentCriteriaModel(
		$workingProgramData->colloquiumAssessmentCriteria->A,
		$workingProgramData->colloquiumAssessmentCriteria->B,
		$workingProgramData->colloquiumAssessmentCriteria->C,
		$workingProgramData->colloquiumAssessmentCriteria->D,
		$workingProgramData->colloquiumAssessmentCriteria->E,
		$workingProgramData->colloquiumAssessmentCriteria->FX ?? '',
		$workingProgramData->colloquiumAssessmentCriteria->F ?? '',
		$workingProgramData->colloquiumAssessmentCriteria->FXAndF ?? '',
		null,
		null,
		$workingProgramData->colloquiumAssessmentCriteria->colloquium->id ?? ''
	) : null;

	$controlWorkAssessmentCriteria = isset($workingProgramData->controlWorkAssessmentCriteria) ? new AssessmentCriteriaModel(
		$workingProgramData->controlWorkAssessmentCriteria->A,
		$workingProgramData->controlWorkAssessmentCriteria->B,
		$workingProgramData->controlWorkAssessmentCriteria->C,
		$workingProgramData->controlWorkAssessmentCriteria->D,
		$workingProgramData->controlWorkAssessmentCriteria->E,
		$workingProgramData->controlWorkAssessmentCriteria->FX ?? '',
		$workingProgramData->controlWorkAssessmentCriteria->F ?? '',
		$workingProgramData->controlWorkAssessmentCriteria->FXAndF ?? '',
		null,
		null,
		$workingProgramData->controlWorkAssessmentCriteria->controlWork->id ?? ''
	) : null;

	$additionalTasksAssessmentCriterias = $workingProgramData->additionalTasksAssessmentCriterias->map(function ($additionalTaskAssessmentCriteria) {
		return new AssessmentCriteriaModel(
			$additionalTaskAssessmentCriteria->A,
			$additionalTaskAssessmentCriteria->B,
			$additionalTaskAssessmentCriteria->C,
			$additionalTaskAssessmentCriteria->D,
			$additionalTaskAssessmentCriteria->E,
			$additionalTaskAssessmentCriteria->FX ?? '',
			$additionalTaskAssessmentCriteria->F ?? '',
			$additionalTaskAssessmentCriteria->FXAndF ?? '',
			$additionalTaskAssessmentCriteria->additionalTask->name ?? '',
			null,
			$additionalTaskAssessmentCriteria->additionalTask->id ?? ''
		);
	})->toArray();

	return [
		"general" => $generalAssessmentCriteria,
		"practical" => $practicalAssessmentCriteria,
		"lab" => $labAssessmentCriteria,
		"seminar" => $seminarAssessmentCriteria,
		"coursework" => $courseworkAssessmentCriteria,
		"courseProject" => $courseProjectAssessmentCriteria,
		"calculationAndGraphicWork" => $calculationAndGraphicWorkAssessmentCriteria,
		"calculationAndGraphicTask" => $calculationAndGraphicTaskAssessmentCriteria,
		"colloquium" => $colloquiumAssessmentCriteria,
		"controlWork" => $controlWorkAssessmentCriteria,
		"additionalTasks" => $additionalTasksAssessmentCriterias,
	];
};
