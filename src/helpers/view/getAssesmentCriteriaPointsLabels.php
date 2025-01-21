<?php

require_once __DIR__ . '/createAssessmentCriteriaLabel.php';
require_once __DIR__ . '/getAssessmentCriteriaPoints.php';

function getAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, $typeOfPoints)
{
	$points = [];

	$semesterNumbersByPoints = [];

	$labels = [];

	if (!empty($pointsDistributionRelatedData)) {
		foreach ($pointsDistributionRelatedData->semesters as $semester) {
			$semesterPointsDistribution = isset($semester->pointsDistribution) ? json_decode($semester->pointsDistribution, true) : null;

			if (isset($semesterPointsDistribution[$typeOfPoints])) {
				$semesterNumbersByPoints[$semesterPointsDistribution[$typeOfPoints]][] = $semester->semesterNumber ?? '';
			}
		}
	}

	if (count($semesterNumbersByPoints) === 1) {
		foreach ($semesterNumbersByPoints as $groupedPoints => $semesterNumbers) {
			$semesterPoints = [];
			$pointsForA = getAssessmentCriteriaPoints($groupedPoints, 'A');
			$pointsForB = getAssessmentCriteriaPoints($groupedPoints, 'B');
			$pointsForC = getAssessmentCriteriaPoints($groupedPoints, 'C');
			$pointsForD = getAssessmentCriteriaPoints($groupedPoints, 'D');
			$pointsForE = getAssessmentCriteriaPoints($groupedPoints, 'E');
			$pointsForFXAndF = getAssessmentCriteriaPoints($groupedPoints, 'FXAndF');

			$semesterPoints['A'] = $pointsForA;
			$semesterPoints['B'] = $pointsForB;
			$semesterPoints['C'] = $pointsForC;
			$semesterPoints['D'] = $pointsForD;
			$semesterPoints['E'] = $pointsForE;
			$semesterPoints['FXAndF'] = $pointsForFXAndF;

			$points['general'] = $semesterPoints;
		}

		$labels['A'] = createGeneralAssessmentCriteriaLabel('A', $points['general']);
		$labels['B'] = createGeneralAssessmentCriteriaLabel('B', $points['general']);
		$labels['C'] = createGeneralAssessmentCriteriaLabel('C', $points['general']);
		$labels['D'] = createGeneralAssessmentCriteriaLabel('D', $points['general']);
		$labels['E'] = createGeneralAssessmentCriteriaLabel('E', $points['general']);
		$labels['FXAndF'] = createGeneralAssessmentCriteriaLabel('FXAndF', $points['general']);

		return $labels;
	}

	if (!empty($semesterNumbersByPoints)) {
		foreach ($semesterNumbersByPoints as $groupedPoints => $semesterNumbers) {
			$semesterPoints = [];

			$pointsForA = getAssessmentCriteriaPoints($groupedPoints, 'A');
			$pointsForB = getAssessmentCriteriaPoints($groupedPoints, 'B');
			$pointsForC = getAssessmentCriteriaPoints($groupedPoints, 'C');
			$pointsForD = getAssessmentCriteriaPoints($groupedPoints, 'D');
			$pointsForE = getAssessmentCriteriaPoints($groupedPoints, 'E');
			$pointsForFXAndF = getAssessmentCriteriaPoints($groupedPoints, 'FXAndF');

			$semesterPoints['A'] = $pointsForA;
			$semesterPoints['B'] = $pointsForB;
			$semesterPoints['C'] = $pointsForC;
			$semesterPoints['D'] = $pointsForD;
			$semesterPoints['E'] = $pointsForE;
			$semesterPoints['FXAndF'] = $pointsForFXAndF;

			$points[$groupedPoints] = $semesterPoints;
		}

		$labels['A'] = createSemestersAssessmentCriteriaLabel('A', $points, $semesterNumbersByPoints);
		$labels['B'] = createSemestersAssessmentCriteriaLabel('B', $points, $semesterNumbersByPoints);
		$labels['C'] = createSemestersAssessmentCriteriaLabel('C', $points, $semesterNumbersByPoints);
		$labels['D'] = createSemestersAssessmentCriteriaLabel('D', $points, $semesterNumbersByPoints);
		$labels['E'] = createSemestersAssessmentCriteriaLabel('E', $points, $semesterNumbersByPoints);
		$labels['FXAndF'] = createSemestersAssessmentCriteriaLabel('FXAndF', $points, $semesterNumbersByPoints);

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
