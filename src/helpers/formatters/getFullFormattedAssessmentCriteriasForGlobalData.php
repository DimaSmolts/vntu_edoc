<?php

require_once __DIR__ . '/../../models/AssessmentCriteriaModel.php';
require_once __DIR__ . '/../../models/WorkingProgramGlobalDataModel.php';
require_once __DIR__ . '/../../helpers/getLessonTypeIdByName.php';
require_once __DIR__ . '/../../helpers/getTaskId.php';

use App\Models\AssessmentCriteriaModel;

function getFullFormattedAssessmentCriteriasForGlobalData($rawDefaultAssessmentCriterias)
{
	$assessmentCriterias = [];

	$lessonTypesIds = getLessonTypeIdByName();
	$tasksIds = getTaskId();

	foreach ($rawDefaultAssessmentCriterias as $assessmentCriteria) {
		if ($assessmentCriteria->isGeneral) {
			$formattedAssessmentCriteria = new AssessmentCriteriaModel(
				$assessmentCriteria->A,
				$assessmentCriteria->B,
				$assessmentCriteria->C,
				$assessmentCriteria->D,
				$assessmentCriteria->E,
				$assessmentCriteria->FX ?? '',
				$assessmentCriteria->F ?? '',
				$assessmentCriteria->FXAndF ?? ''
			);

			$assessmentCriterias["general"] = $formattedAssessmentCriteria;
		} else if ($assessmentCriteria->lessonTypeId === $lessonTypesIds->practical) {
			$formattedAssessmentCriteria = new AssessmentCriteriaModel(
				$assessmentCriteria->A,
				$assessmentCriteria->B,
				$assessmentCriteria->C,
				$assessmentCriteria->D,
				$assessmentCriteria->E,
				$assessmentCriteria->FX ?? '',
				$assessmentCriteria->F ?? '',
				$assessmentCriteria->FXAndF ?? '',
				null,
				$assessmentCriteria->lessonTypeId ?? '',
				null,
			);

			$assessmentCriterias["practical"] = $formattedAssessmentCriteria;
		} else if ($assessmentCriteria->lessonTypeId === $lessonTypesIds->laboratory) {
			$formattedAssessmentCriteria = new AssessmentCriteriaModel(
				$assessmentCriteria->A,
				$assessmentCriteria->B,
				$assessmentCriteria->C,
				$assessmentCriteria->D,
				$assessmentCriteria->E,
				$assessmentCriteria->FX ?? '',
				$assessmentCriteria->F ?? '',
				$assessmentCriteria->FXAndF ?? '',
				null,
				$assessmentCriteria->lessonTypeId ?? '',
				null,
			);

			$assessmentCriterias["laboratory"] = $formattedAssessmentCriteria;
		} else if ($assessmentCriteria->lessonTypeId === $lessonTypesIds->seminar) {
			$formattedAssessmentCriteria = new AssessmentCriteriaModel(
				$assessmentCriteria->A,
				$assessmentCriteria->B,
				$assessmentCriteria->C,
				$assessmentCriteria->D,
				$assessmentCriteria->E,
				$assessmentCriteria->FX ?? '',
				$assessmentCriteria->F ?? '',
				$assessmentCriteria->FXAndF ?? '',
				null,
				$assessmentCriteria->lessonTypeId ?? '',
				null,
			);

			$assessmentCriterias["seminar"] = $formattedAssessmentCriteria;
		} else if ($assessmentCriteria->taskTypeId === $tasksIds->coursework) {
			$formattedAssessmentCriteria = new AssessmentCriteriaModel(
				$assessmentCriteria->A,
				$assessmentCriteria->B,
				$assessmentCriteria->C,
				$assessmentCriteria->D,
				$assessmentCriteria->E,
				$assessmentCriteria->FX ?? '',
				$assessmentCriteria->F ?? '',
				$assessmentCriteria->FXAndF ?? '',
				null,
				null,
				$assessmentCriteria->taskTypeId ?? '',
			);

			$assessmentCriterias["coursework"] = $formattedAssessmentCriteria;
		} else if ($assessmentCriteria->taskTypeId === $tasksIds->courseProject) {
			$formattedAssessmentCriteria = new AssessmentCriteriaModel(
				$assessmentCriteria->A,
				$assessmentCriteria->B,
				$assessmentCriteria->C,
				$assessmentCriteria->D,
				$assessmentCriteria->E,
				$assessmentCriteria->FX ?? '',
				$assessmentCriteria->F ?? '',
				$assessmentCriteria->FXAndF ?? '',
				null,
				null,
				$assessmentCriteria->taskTypeId ?? '',
			);

			$assessmentCriterias["courseProject"] = $formattedAssessmentCriteria;
		} else if ($assessmentCriteria->taskTypeId === $tasksIds->calculationAndGraphicWork) {
			$formattedAssessmentCriteria = new AssessmentCriteriaModel(
				$assessmentCriteria->A,
				$assessmentCriteria->B,
				$assessmentCriteria->C,
				$assessmentCriteria->D,
				$assessmentCriteria->E,
				$assessmentCriteria->FX ?? '',
				$assessmentCriteria->F ?? '',
				$assessmentCriteria->FXAndF ?? '',
				null,
				null,
				$assessmentCriteria->taskTypeId ?? '',
			);

			$assessmentCriterias["calculationAndGraphicWork"] = $formattedAssessmentCriteria;
		} else if ($assessmentCriteria->taskTypeId === $tasksIds->calculationAndGraphicTask) {
			$formattedAssessmentCriteria = new AssessmentCriteriaModel(
				$assessmentCriteria->A,
				$assessmentCriteria->B,
				$assessmentCriteria->C,
				$assessmentCriteria->D,
				$assessmentCriteria->E,
				$assessmentCriteria->FX ?? '',
				$assessmentCriteria->F ?? '',
				$assessmentCriteria->FXAndF ?? '',
				null,
				null,
				$assessmentCriteria->taskTypeId ?? '',
			);

			$assessmentCriterias["calculationAndGraphicTask"] = $formattedAssessmentCriteria;
		} else if ($assessmentCriteria->taskTypeId === $tasksIds->colloquium) {
			$formattedAssessmentCriteria = new AssessmentCriteriaModel(
				$assessmentCriteria->A,
				$assessmentCriteria->B,
				$assessmentCriteria->C,
				$assessmentCriteria->D,
				$assessmentCriteria->E,
				$assessmentCriteria->FX ?? '',
				$assessmentCriteria->F ?? '',
				$assessmentCriteria->FXAndF ?? '',
				null,
				null,
				$assessmentCriteria->taskTypeId ?? '',
			);

			$assessmentCriterias["colloquium"] = $formattedAssessmentCriteria;
		} else if ($assessmentCriteria->taskTypeId === $tasksIds->controlWork) {
			$formattedAssessmentCriteria = new AssessmentCriteriaModel(
				$assessmentCriteria->A,
				$assessmentCriteria->B,
				$assessmentCriteria->C,
				$assessmentCriteria->D,
				$assessmentCriteria->E,
				$assessmentCriteria->FX ?? '',
				$assessmentCriteria->F ?? '',
				$assessmentCriteria->FXAndF ?? '',
				null,
				null,
				$assessmentCriteria->taskTypeId ?? '',
			);

			$assessmentCriterias["controlWork"] = $formattedAssessmentCriteria;
		} else if ($assessmentCriteria->isAdditionalTask) {
			$formattedAssessmentCriteria = new AssessmentCriteriaModel(
				$assessmentCriteria->A,
				$assessmentCriteria->B,
				$assessmentCriteria->C,
				$assessmentCriteria->D,
				$assessmentCriteria->E,
				$assessmentCriteria->FX ?? '',
				$assessmentCriteria->F ?? '',
				$assessmentCriteria->FXAndF ?? '',
				null,
				null,
				null,
			);

			$assessmentCriterias["additionalTasks"] = $formattedAssessmentCriteria;
		}
	};

	return $assessmentCriterias;
};
