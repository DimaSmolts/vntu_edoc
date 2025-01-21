<?php

require_once __DIR__ . '/createAssessmentCriteriaLabel.php';
require_once __DIR__ . '/getAssessmentCriteriaPoints.php';

function getModuleWorkAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, $typeOfModuleWork)
{
	$isModuleWorkExistsField = $typeOfModuleWork === "colloquium" ? "isColloquiumExists" : "isControlWorkExists";
	$moduleWorkPointsField = $typeOfModuleWork === "colloquium" ? "colloquiumPoints" : "controlWorkPoints";

	$points = [];

	$modulesNumbersByPoints = [];

	$labels = [];

	if (!empty($pointsDistributionRelatedData)) {
		foreach ($pointsDistributionRelatedData->semesters as $semester) {
			if (!empty($semester->modules)) {
				foreach ($semester->modules as $module) {
					if ($module->{$isModuleWorkExistsField}) {
						$modulesNumbersByPoints[$module->{$moduleWorkPointsField}][] = $module->moduleNumber ?? '';
					}
				}
			}
		}
	}

	if (count($modulesNumbersByPoints) === 1) {
		foreach ($modulesNumbersByPoints as $groupedPoints => $modulesNumbers) {
			$modulePoints = [];

			$pointsForA = getAssessmentCriteriaPoints($groupedPoints, 'A');
			$pointsForB = getAssessmentCriteriaPoints($groupedPoints, 'B');
			$pointsForC = getAssessmentCriteriaPoints($groupedPoints, 'C');
			$pointsForD = getAssessmentCriteriaPoints($groupedPoints, 'D');
			$pointsForE = getAssessmentCriteriaPoints($groupedPoints, 'E');
			$pointsForFXAndF = getAssessmentCriteriaPoints($groupedPoints, 'FXAndF');

			$modulePoints['A'] = $pointsForA;
			$modulePoints['B'] = $pointsForB;
			$modulePoints['C'] = $pointsForC;
			$modulePoints['D'] = $pointsForD;
			$modulePoints['E'] = $pointsForE;
			$modulePoints['FXAndF'] = $pointsForFXAndF;

			$points['general'] = $modulePoints;
		}

		$labels['A'] = createGeneralAssessmentCriteriaLabel('A', $points['general']);
		$labels['B'] = createGeneralAssessmentCriteriaLabel('B', $points['general']);
		$labels['C'] = createGeneralAssessmentCriteriaLabel('C', $points['general']);
		$labels['D'] = createGeneralAssessmentCriteriaLabel('D', $points['general']);
		$labels['E'] = createGeneralAssessmentCriteriaLabel('E', $points['general']);
		$labels['FXAndF'] = createGeneralAssessmentCriteriaLabel('FXAndF', $points['general']);

		return $labels;
	}

	if (!empty($modulesNumbersByPoints)) {
		foreach ($modulesNumbersByPoints as $groupedPoints => $modulesNumbers) {
			$modulePoints = [];

			$pointsForA = getAssessmentCriteriaPoints($groupedPoints, 'A');
			$pointsForB = getAssessmentCriteriaPoints($groupedPoints, 'B');
			$pointsForC = getAssessmentCriteriaPoints($groupedPoints, 'C');
			$pointsForD = getAssessmentCriteriaPoints($groupedPoints, 'D');
			$pointsForE = getAssessmentCriteriaPoints($groupedPoints, 'E');
			$pointsForFXAndF = getAssessmentCriteriaPoints($groupedPoints, 'FXAndF');

			$modulePoints['A'] = $pointsForA;
			$modulePoints['B'] = $pointsForB;
			$modulePoints['C'] = $pointsForC;
			$modulePoints['D'] = $pointsForD;
			$modulePoints['E'] = $pointsForE;
			$modulePoints['FXAndF'] = $pointsForFXAndF;

			$points[$groupedPoints] = $modulePoints;
		}

		$labels['A'] = createModulesAssessmentCriteriaLabel('A', $points, $modulesNumbersByPoints);
		$labels['B'] = createModulesAssessmentCriteriaLabel('B', $points, $modulesNumbersByPoints);
		$labels['C'] = createModulesAssessmentCriteriaLabel('C', $points, $modulesNumbersByPoints);
		$labels['D'] = createModulesAssessmentCriteriaLabel('D', $points, $modulesNumbersByPoints);
		$labels['E'] = createModulesAssessmentCriteriaLabel('E', $points, $modulesNumbersByPoints);
		$labels['FXAndF'] = createModulesAssessmentCriteriaLabel('FXAndF', $points, $modulesNumbersByPoints);

		return $labels;
	}

	$labels['A'] = '';
	$labels['B'] = '';
	$labels['C'] = '';
	$labels['D'] = '';
	$labels['E'] = '';
	$labels['FXAndF'] = '';

	return $labels;
}
