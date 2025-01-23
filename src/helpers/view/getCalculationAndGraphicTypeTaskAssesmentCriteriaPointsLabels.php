<?php

require_once __DIR__ . '/createAssessmentCriteriaLabel.php';
require_once __DIR__ . '/createAssessmentCriteriaLabelForPDF.php';
require_once __DIR__ . '/getAssessmentCriteriaPoints.php';

function getCalculationAndGraphicTypeTaskAssesmentCriteriaPointsLabels($pointsDistributionRelatedData, $taskTypeId, $isPDF = false)
{
	$points = [];

	$semesterNumbersByPoints = [];

	$labels = [];

	if (!empty($pointsDistributionRelatedData)) {
		foreach ($pointsDistributionRelatedData->semesters as $semester) {
			$taskDetails = null;
			if (isset($semester->calculationAndGraphicTypeTask)) {
				if ($semester->calculationAndGraphicTypeTask->taskTypeId === $taskTypeId)
					$taskDetails = $semester->calculationAndGraphicTypeTask;
			}

			if (isset($taskDetails)) {
				$semesterNumbersByPoints[$taskDetails->points][] = $semester->semesterNumber ?? '';
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

		if ($isPDF) {
			$labels['A'] = createSemestersAssessmentCriteriaLabelForPDF('A', $points, $semesterNumbersByPoints);
			$labels['B'] = createSemestersAssessmentCriteriaLabelForPDF('B', $points, $semesterNumbersByPoints);
			$labels['C'] = createSemestersAssessmentCriteriaLabelForPDF('C', $points, $semesterNumbersByPoints);
			$labels['D'] = createSemestersAssessmentCriteriaLabelForPDF('D', $points, $semesterNumbersByPoints);
			$labels['E'] = createSemestersAssessmentCriteriaLabelForPDF('E', $points, $semesterNumbersByPoints);
			$labels['FXAndF'] = createSemestersAssessmentCriteriaLabelForPDF('FXAndF', $points, $semesterNumbersByPoints);
		} else {
			$labels['A'] = createSemestersAssessmentCriteriaLabel('A', $points, $semesterNumbersByPoints);
			$labels['B'] = createSemestersAssessmentCriteriaLabel('B', $points, $semesterNumbersByPoints);
			$labels['C'] = createSemestersAssessmentCriteriaLabel('C', $points, $semesterNumbersByPoints);
			$labels['D'] = createSemestersAssessmentCriteriaLabel('D', $points, $semesterNumbersByPoints);
			$labels['E'] = createSemestersAssessmentCriteriaLabel('E', $points, $semesterNumbersByPoints);
			$labels['FXAndF'] = createSemestersAssessmentCriteriaLabel('FXAndF', $points, $semesterNumbersByPoints);
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
