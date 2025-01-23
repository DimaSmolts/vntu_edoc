<?php
require_once __DIR__ . '/getAssesmentCriteriaPointsLabels.php';
require_once __DIR__ . '/getCalculationAndGraphicTypeTaskAssesmentCriteriaPointsLabels.php';
require_once __DIR__ . '/getAdditionalTaskAssesmentCriteriaPointsLabels.php';
require_once __DIR__ . '/getModuleWorkAssesmentCriteriaPointsLabels.php';

function getConfigAndDataForAssesmentCriteriaByTypeOfWorkPDF($pointsDistributionRelatedData, $structure, $details)
{
	$assesmentCriterias = [];

	if ($structure->isPracticalsExist) {
		$header = 'Практичне завдання';
		$criterias = $details->assessmentCriterias['practical'];
		$labels = getAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, 'practicalPoints', true);

		$criterias = (object)[
			'header' => $header,
			'criterias' => $criterias,
			'labels' => $labels,
		];

		$assesmentCriterias[] = $criterias;
	}

	if ($structure->isLabsExist) {
		$header = 'Лабораторна робота';
		$criterias = $details->assessmentCriterias['lab'];
		$labels = getAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, 'labPoints', true);

		$criterias = (object)[
			'header' => $header,
			'criterias' => $criterias,
			'labels' => $labels,
		];

		$assesmentCriterias[] = $criterias;
	}

	if ($structure->isSeminarsExist) {
		$header = 'Семінарська робота';
		$criterias = $details->assessmentCriterias['seminar'];
		$labels = getAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, 'seminarPoints', true);

		$criterias = (object)[
			'header' => $header,
			'criterias' => $criterias,
			'labels' => $labels,
		];

		$assesmentCriterias[] = $criterias;
	}

	if ($structure->isCalculationAndGraphicWorkExists) {
		$header = 'РГР';
		$criterias = $details->assessmentCriterias['calculationAndGraphicWork'];
		$labels = getCalculationAndGraphicTypeTaskAssesmentCriteriaPointsLabels(
			$pointsDistributionRelatedData,
			$details->assessmentCriterias['calculationAndGraphicWork']->taskTypeId,
			true
		);

		$criterias = (object)[
			'header' => $header,
			'criterias' => $criterias,
			'labels' => $labels,
		];

		$assesmentCriterias[] = $criterias;
	}

	if ($structure->isCalculationAndGraphicTaskExists) {
		$header = 'РГЗ';
		$criterias = $details->assessmentCriterias['calculationAndGraphicTask'];
		$labels = getCalculationAndGraphicTypeTaskAssesmentCriteriaPointsLabels(
			$pointsDistributionRelatedData,
			$details->assessmentCriterias['calculationAndGraphicTask']->taskTypeId,
			true
		);

		$criterias = (object)[
			'header' => $header,
			'criterias' => $criterias,
			'labels' => $labels,
		];

		$assesmentCriterias[] = $criterias;
	}

	if ($structure->isAdditionalTasksExist) {
		foreach ($details->assessmentCriterias['additionalTasks'] as $additionalTask) {
			$header = mb_ucfirst($additionalTask->taskName);
			$criterias = $additionalTask;
			$labels = getAdditionalTaskAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, $additionalTask->taskName, true);

			$criterias = (object)[
				'header' => $header,
				'criterias' => $criterias,
				'labels' => $labels,
			];

			$assesmentCriterias[] = $criterias;
		}
	}

	if ($structure->isColloquiumExists) {
		$header = 'Колоквіум';
		$criterias = $details->assessmentCriterias['colloquium'];
		$labels = getModuleWorkAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, 'colloquium', true);

		$criterias = (object)[
			'header' => $header,
			'criterias' => $criterias,
			'labels' => $labels,
		];

		$assesmentCriterias[] = $criterias;
	}

	if ($structure->isControlWorkExists) {
		$header = 'Контрольна робота';
		$criterias = $details->assessmentCriterias['controlWork'];
		$labels = getModuleWorkAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, 'controlWork', true);

		$criterias = (object)[
			'header' => $header,
			'criterias' => $criterias,
			'labels' => $labels,
		];

		$assesmentCriterias[] = $criterias;
	}

	$groupedAssesmentCriterias = array_chunk($assesmentCriterias, 4);
	$groupedAssesmentCriteriasWithConfigs = [];

	foreach ($groupedAssesmentCriterias as $group) {
		$fullTableWidth = 100;
		$competenceLevelColumnWidth = 12;
		$ECTSColumnWidth = 10;

		$groupLength = count($group);

		$assessmentsCriteriaHeaderColumnWidth = $fullTableWidth - $competenceLevelColumnWidth - $ECTSColumnWidth;

		$assessmentsCriteriaHeaderColumn = (object)[
			'width' => $assessmentsCriteriaHeaderColumnWidth,
			'colspan' => $groupLength
		];

		$assessmentsCriteriaColumnWidth = $assessmentsCriteriaHeaderColumnWidth / $groupLength;

		$config = (object)[
			'competenceLevelColumnWidth' => $competenceLevelColumnWidth,
			'ECTSColumnWidth' => $ECTSColumnWidth,
			'assessmentsCriteriaHeaderColumn' => $assessmentsCriteriaHeaderColumn,
			'assessmentsCriteriaColumnWidth' => $assessmentsCriteriaColumnWidth
		];

		$dataWithConfig = (object)[
			'data' => $group,
			'config' => $config,
		];

		$groupedAssesmentCriteriasWithConfigs[] = $dataWithConfig;
	}

	return $groupedAssesmentCriteriasWithConfigs;
}
