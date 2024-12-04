<?php

function getPointsByTypeOfWork($pointsDistributionRelatedData, $structure)
{
	$pointsByTypeOfWork = [
		'practicalPoints' => [],
		'labPoints' => [],
		'seminarPoints' => [],
	];

	$pointsDistribution = isset($pointsDistributionRelatedData->pointsDistribution) ? json_decode($pointsDistributionRelatedData->pointsDistribution, true) : null;

	if ($structure->isPracticalsExist) {
		$practicalPointsData = [];
		$practicalPoints = $pointsDistribution['practicalPoints'] ?? 0;

		if (!empty($pointsDistributionRelatedData->semesters)) {
			foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
				$modulesPoints = [];
				$semesterPoints = 0;
				if (!empty($semesterData->modules)) {
					foreach ($semesterData->modules as $moduleData) {
						$modulesPoints['module' . $moduleData->moduleId] = $moduleData->practicals * $practicalPoints;
						$semesterPoints += $modulesPoints['module' . $moduleData->moduleId];
					}
				}

				$practicalPointsData['semester' . $semesterData->id] = $modulesPoints;
				$practicalPointsData['semester' . $semesterData->id . 'Sum'] = $semesterPoints;
			}
		}

		$pointsByTypeOfWork['practicalPoints'] = $practicalPointsData;
	}

	if ($structure->isLabsExist) {
		$labPointsData = [];
		$labPoints = $pointsDistribution['labPoints'] ?? 0;

		if (!empty($pointsDistributionRelatedData->semesters)) {
			foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
				$modulesPoints = [];
				$semesterPoints = 0;
				if (!empty($semesterData->modules)) {
					foreach ($semesterData->modules as $moduleData) {
						$modulesPoints['module' . $moduleData->moduleId] = $moduleData->labs * $labPoints;
						$semesterPoints += $modulesPoints['module' . $moduleData->moduleId];
					}
				}

				$labPointsData['semester' . $semesterData->id] = $modulesPoints;
				$labPointsData['semester' . $semesterData->id . 'Sum'] = $semesterPoints;
			}
		}

		$pointsByTypeOfWork['labPoints'] = $labPointsData;
	}

	if ($structure->isSeminarsExist) {
		$seminarPointsData = [];
		$seminarPoints = $pointsDistribution['seminarPoints'] ?? 0;

		if (!empty($pointsDistributionRelatedData->semesters)) {
			foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
				$modulesPoints = [];
				$semesterPoints = 0;
				if (!empty($semesterData->modules)) {
					foreach ($semesterData->modules as $moduleData) {
						$modulesPoints['module' . $moduleData->moduleId] = $moduleData->seminars * $seminarPoints;
						$semesterPoints += $modulesPoints['module' . $moduleData->moduleId];
					}
				}

				$seminarPointsData['semester' . $semesterData->id] = $modulesPoints;
				$seminarPointsData['semester' . $semesterData->id . 'Sum'] = $semesterPoints;
			}
		}

		$pointsByTypeOfWork['seminarPoints'] = $seminarPointsData;
	}

	if ($structure->isColloquiumExists) {
		$colloquiumPointsData = [];

		if (!empty($pointsDistributionRelatedData->semesters)) {
			foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
				$modulesPoints = [];
				$semesterPoints = 0;
				if (!empty($semesterData->modules)) {
					foreach ($semesterData->modules as $moduleData) {
						$modulesPoints['module' . $moduleData->moduleId] = $moduleData->colloquiumPoints ?? 0;
						$semesterPoints += $modulesPoints['module' . $moduleData->moduleId];
					}
				}

				$colloquiumPointsData['semester' . $semesterData->id] = $modulesPoints;
				$colloquiumPointsData['semester' . $semesterData->id . 'Sum'] = $semesterPoints;
			}
		}

		$pointsByTypeOfWork['colloquiumPoints'] = $colloquiumPointsData;
	}

	$semestersTotalData = [];

	if (!empty($pointsDistributionRelatedData->semesters)) {
		foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
			$modulesTotalData = [];
			$semesterTotalPoints = 0;

			if (!empty($semesterData->modules)) {
				foreach ($semesterData->modules as $moduleData) {
					$practicalTotal = empty($pointsByTypeOfWork['practicalPoints']) ? 0 : $pointsByTypeOfWork['practicalPoints']['semester' . $semesterData->id]['module' . $moduleData->moduleId];
					$labTotal = empty($pointsByTypeOfWork['labPoints']) ? 0 : $pointsByTypeOfWork['labPoints']['semester' . $semesterData->id]['module' . $moduleData->moduleId];
					$seminarTotal = empty($pointsByTypeOfWork['seminarPoints']) ? 0 : $pointsByTypeOfWork['seminarPoints']['semester' . $semesterData->id]['module' . $moduleData->moduleId];
					$colloquiumPoints = isset($moduleData->colloquiumPoints) ? $moduleData->colloquiumPoints : 0;

					$modulesTotalData['module' . $moduleData->moduleId] = $practicalTotal + $labTotal + $seminarTotal + $colloquiumPoints;
					$semesterTotalPoints += $modulesTotalData['module' . $moduleData->moduleId];
				}
			}

			$semestersTotalData['semester' . $semesterData->id] = $modulesTotalData;
			$semestersTotalData['semester' . $semesterData->id . 'Sum'] = $semesterTotalPoints;
		}
	}

	$pointsByTypeOfWork['totalByModules'] = $semestersTotalData;

	$totalBySemesters = [];

	if (!empty($pointsDistributionRelatedData->semesters)) {
		foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
			if ($semesterData->examType === 'іспит') {
				$examPoints = $pointsDistribution['examPoints'] ?? 0;
				$totalBySemesters['semester' . $semesterData->id . 'Sum'] = $pointsByTypeOfWork['totalByModules']['semester' . $semesterData->id . 'Sum'] + $examPoints;
			} else {
				$totalBySemesters['semester' . $semesterData->id . 'Sum'] = $pointsByTypeOfWork['totalByModules']['semester' . $semesterData->id . 'Sum'];
			}
		}
	}

	$pointsByTypeOfWork['totalBySemesters'] = $totalBySemesters;

	return $pointsByTypeOfWork;
}
