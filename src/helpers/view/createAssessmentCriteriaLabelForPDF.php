<?php

function createGeneralAssessmentCriteriaLabelForPDF($ECTS, $points)
{
	$labels = [];

	$labels[] = $points[$ECTS]->min . "-" . $points[$ECTS]->max . " б.:";

	return $labels;
}

function createSemestersAssessmentCriteriaLabelForPDF($ECTS, $points, $semesterNumbersByPoints)
{
	$labelsBySemesters = [];

	$lastKey = array_key_last($semesterNumbersByPoints);

	foreach ($semesterNumbersByPoints as $groupedPoints => $semestersNumbers) {
		$semestersNumbersString = implode('-', $semestersNumbers);

		$label = "С" . $semestersNumbersString . " " . $points[$groupedPoints][$ECTS]->min . "-" . $points[$groupedPoints][$ECTS]->max . " б.";

		if ($groupedPoints === $lastKey) {
			$label .= ":";
		}

		$labelsBySemesters[] = $label;
	}

	return $labelsBySemesters;
}

function createModulesAssessmentCriteriaLabelForPDF($ECTS, $points, $modulesNumbersByPoints)
{
	$labelsByModules = [];

	$lastKey = array_key_last($modulesNumbersByPoints);

	foreach ($modulesNumbersByPoints as $groupedPoints => $modulesNumbers) {
		$modulesNumbersString = implode('-', $modulesNumbers);

		$label = "М" . $modulesNumbersString . " " . $points[$groupedPoints][$ECTS]->min . "-" . $points[$groupedPoints][$ECTS]->max . " б.";

		if ($groupedPoints === $lastKey) {
			$label .= ":";
		}

		$labelsByModules[] = $label;
	}

	return $labelsByModules;
}
