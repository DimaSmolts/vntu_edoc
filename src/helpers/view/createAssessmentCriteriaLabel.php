<?php

function createGeneralAssessmentCriteriaLabel($ECTS, $points)
{
	$ECTSName = $ECTS === "FXAndF" ? "FX, F" : $ECTS;

	if (isset($points[$ECTS]->zero)) {
		return "$ECTSName (" . $points[$ECTS]->zero . " б.):";
	} else {
		return "$ECTSName (" . $points[$ECTS]->min . "-" . $points[$ECTS]->max . " б.):";
	}
}

function createSemestersAssessmentCriteriaLabel($ECTS, $points, $semesterNumbersByPoints)
{
	$ECTSName = $ECTS === "FXAndF" ? "FX, F" : $ECTS;

	$label = "$ECTSName (";

	$lastKey = array_key_last($semesterNumbersByPoints);

	foreach ($semesterNumbersByPoints as $groupedPoints => $semestersNumbers) {
		$semestersString = implode(', ', $semestersNumbers);

		if (isset($points[$groupedPoints][$ECTS]->zero)) {
			$label .= $points[$groupedPoints][$ECTS]->zero . " б. (" . $semestersString . " сем.)";
		} else {
			$label .= $points[$groupedPoints][$ECTS]->min . "-" . $points[$groupedPoints][$ECTS]->max . " б. (" . $semestersString . " сем.)";
		}

		if ($groupedPoints === $lastKey) {
			$label .= "):";
		} else {
			$label .= ", ";
		}
	}
	return $label;
}

function createModulesAssessmentCriteriaLabel($ECTS, $points, $modulesNumbersByPoints)
{
	$ECTSName = $ECTS === "FXAndF" ? "FX, F" : $ECTS;

	$label = "$ECTSName (";

	$lastKey = array_key_last($modulesNumbersByPoints);

	foreach ($modulesNumbersByPoints as $groupedPoints => $modulesNumbers) {
		$modulesString = implode(', ', $modulesNumbers);

		if (isset($points[$groupedPoints][$ECTS]->zero)) {
			$label .= $points[$groupedPoints][$ECTS]->zero . " б. (" . $modulesString . " мод.)";
		} else {
			$label .= $points[$groupedPoints][$ECTS]->min . "-" . $points[$groupedPoints][$ECTS]->max . " б. (" . $modulesString . " мод.)";
		}

		if ($groupedPoints === $lastKey) {
			$label .= "):";
		} else {
			$label .= ", ";
		}
	}
	return $label;
}
