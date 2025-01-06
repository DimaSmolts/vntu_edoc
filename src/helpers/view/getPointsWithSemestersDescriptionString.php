<?php

function getPointsWithSemestersDescriptionString($pointsDistributionSemestersData, $typeOfPoints)
{
	$semesterNumbersByPoints = [];

	foreach ($pointsDistributionSemestersData as $semesterData) {
		if (isset($semesterData->pointsDistribution)) {
			$points = json_decode($semesterData->pointsDistribution, true);

			if (isset($semesterData->semesterNumber)) {
				$semesterNumbersByPoints[$points[$typeOfPoints]][] = $semesterData->semesterNumber;
			}
		}
	}

	$pointsForSemesters = [];

	foreach ($semesterNumbersByPoints as $points => $semesterNumbers) {
		$semestersString = implode(', ', $semesterNumbers);

		$pointsForSemesters[] = $points . ' б. (' . $semestersString . ' сем)';
	}

	return implode(', ', $pointsForSemesters);
}
