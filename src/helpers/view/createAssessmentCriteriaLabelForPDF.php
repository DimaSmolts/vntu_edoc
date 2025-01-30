<?php

function createGeneralAssessmentCriteriaLabelForPDF($ECTS, $points)
{
	$labels = [];

	if (isset($points[$ECTS]->zero)) {
		$labels[] = $points[$ECTS]->zero . " б.:";
	} else {
		$labels[] = $points[$ECTS]->min . "-" . $points[$ECTS]->max . " б.:";
	}

	return $labels;
}

function createSemestersAssessmentCriteriaLabelForPDF($ECTS, $points, $semesterNumbersByPoints)
{
	$labelsBySemesters = [];

	$lastKey = array_key_last($semesterNumbersByPoints);

	foreach ($semesterNumbersByPoints as $groupedPoints => $semestersNumbers) {
		$semestersNumbersString = implode('-', $semestersNumbers);

		if (isset($points[$groupedPoints][$ECTS]->zero)) {
			$label = "С" . $semestersNumbersString . " " . $points[$groupedPoints][$ECTS]->zero . " б.";
		} else {
			$label = "С" . $semestersNumbersString . " " . $points[$groupedPoints][$ECTS]->min . "-" . $points[$groupedPoints][$ECTS]->max . " б.";
		}

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

		if (isset($points[$groupedPoints][$ECTS]->zero)) {
			$label = "М" . $modulesNumbersString . " " . $points[$groupedPoints][$ECTS]->zero . " б.";
		} else {
			$label = "М" . $modulesNumbersString . " " . $points[$groupedPoints][$ECTS]->min . "-" . $points[$groupedPoints][$ECTS]->max . " б.";
		}

		if ($groupedPoints === $lastKey) {
			$label .= ":";
		}

		$labelsByModules[] = $label;
	}

	return $labelsByModules;
}
