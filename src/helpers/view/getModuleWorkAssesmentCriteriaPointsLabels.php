<?php

require_once __DIR__ . '/createAssessmentCriteriaLabel.php';
require_once __DIR__ . '/createAssessmentCriteriaLabelForPDF.php';
require_once __DIR__ . '/getAssessmentCriteriaPoints.php';

function getModuleWorkAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, $typeOfModuleWork, $isPDF = false)
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

		if ($isPDF) {
			$labels['A'] = createGeneralAssessmentCriteriaLabelForPDF('A', $points['general']);
			$labels['B'] = createGeneralAssessmentCriteriaLabelForPDF('B', $points['general']);
			$labels['C'] = createGeneralAssessmentCriteriaLabelForPDF('C', $points['general']);
			$labels['D'] = createGeneralAssessmentCriteriaLabelForPDF('D', $points['general']);
			$labels['E'] = createGeneralAssessmentCriteriaLabelForPDF('E', $points['general']);
			$labels['FXAndF'] = createGeneralAssessmentCriteriaLabelForPDF('FXAndF', $points['general']);
		} else {
			$labels['A'] = createGeneralAssessmentCriteriaLabel('A', $points['general']);
			$labels['B'] = createGeneralAssessmentCriteriaLabel('B', $points['general']);
			$labels['C'] = createGeneralAssessmentCriteriaLabel('C', $points['general']);
			$labels['D'] = createGeneralAssessmentCriteriaLabel('D', $points['general']);
			$labels['E'] = createGeneralAssessmentCriteriaLabel('E', $points['general']);
			$labels['FXAndF'] = createGeneralAssessmentCriteriaLabel('FXAndF', $points['general']);
		}

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

		if ($isPDF) {
			$labels['A'] = createModulesAssessmentCriteriaLabelForPDF('A', $points, $modulesNumbersByPoints);
			$labels['B'] = createModulesAssessmentCriteriaLabelForPDF('B', $points, $modulesNumbersByPoints);
			$labels['C'] = createModulesAssessmentCriteriaLabelForPDF('C', $points, $modulesNumbersByPoints);
			$labels['D'] = createModulesAssessmentCriteriaLabelForPDF('D', $points, $modulesNumbersByPoints);
			$labels['E'] = createModulesAssessmentCriteriaLabelForPDF('E', $points, $modulesNumbersByPoints);
			$labels['FXAndF'] = createModulesAssessmentCriteriaLabelForPDF('FXAndF', $points, $modulesNumbersByPoints);
		} else {
			$labels['A'] = createModulesAssessmentCriteriaLabel('A', $points, $modulesNumbersByPoints);
			$labels['B'] = createModulesAssessmentCriteriaLabel('B', $points, $modulesNumbersByPoints);
			$labels['C'] = createModulesAssessmentCriteriaLabel('C', $points, $modulesNumbersByPoints);
			$labels['D'] = createModulesAssessmentCriteriaLabel('D', $points, $modulesNumbersByPoints);
			$labels['E'] = createModulesAssessmentCriteriaLabel('E', $points, $modulesNumbersByPoints);
			$labels['FXAndF'] = createModulesAssessmentCriteriaLabel('FXAndF', $points, $modulesNumbersByPoints);
		}

		return $labels;
	}

	$labels['A'] = $isPDF ? [] : 'A';
	$labels['B'] = $isPDF ? [] : 'B';
	$labels['C'] = $isPDF ? [] : 'C';
	$labels['D'] = $isPDF ? [] : 'D';
	$labels['E'] = $isPDF ? [] : 'E';
	$labels['FXAndF'] = $isPDF ? "" : 'FXAndF';

	return $labels;
}
