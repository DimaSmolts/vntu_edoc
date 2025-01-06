<?php

function getPointsByTypeOfWork($pointsDistributionRelatedData, $structure)
{
	$pointsByTypeOfWork = [
		'practicalPoints' => [],
		'labPoints' => [],
		'seminarPoints' => [],
		'colloquiumPoints' => [],
		'controlWorkPoints' => [],
		'calculationAndGraphicPoints' => []
	];

	$pointsDistributionBySemesters = isset($pointsDistributionRelatedData->pointsDistribution) ? json_decode($pointsDistributionRelatedData->pointsDistribution, true) : null;

	$pointsDistributionBySemesters = [];
	if (!empty($pointsDistributionRelatedData->semesters)) {
		foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
			$pointsDistributionBySemesters[$semesterData->id] = isset($semesterData->pointsDistribution) ? json_decode($semesterData->pointsDistribution, true) : null;
		}
	}


	if ($structure->isPracticalsExist) {
		$practicalPointsData = [];

		if (!empty($pointsDistributionRelatedData->semesters)) {
			foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
				$practicalPoints = $pointsDistributionBySemesters[$semesterData->id]['practicalPoints'] ?? 0;

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

		if (!empty($pointsDistributionRelatedData->semesters)) {
			foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
				$labPoints = $pointsDistributionBySemesters[$semesterData->id]['labPoints'] ?? 0;

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

		if (!empty($pointsDistributionRelatedData->semesters)) {
			foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
				$seminarPoints = $pointsDistributionBySemesters[$semesterData->id]['seminarPoints'] ?? 0;

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

	if ($structure->isControlWorkExists) {
		$controlWorkPointsData = [];

		if (!empty($pointsDistributionRelatedData->semesters)) {
			foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
				$modulesPoints = [];
				$semesterPoints = 0;
				if (!empty($semesterData->modules)) {
					foreach ($semesterData->modules as $moduleData) {
						$modulesPoints['module' . $moduleData->moduleId] = $moduleData->controlWorkPoints ?? 0;
						$semesterPoints += $modulesPoints['module' . $moduleData->moduleId];
					}
				}

				$controlWorkPointsData['semester' . $semesterData->id] = $modulesPoints;
				$controlWorkPointsData['semester' . $semesterData->id . 'Sum'] = $semesterPoints;
			}
		}

		$pointsByTypeOfWork['controlWorkPoints'] = $controlWorkPointsData;
	}

	if ($structure->isCalculationAndGraphicWorkExists || $structure->isCalculationAndGraphicTaskExists) {
		$calculationAndGraphicPointsData = [];

		if (!empty($pointsDistributionRelatedData->semesters)) {
			foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
				$calculationAndGraphicPointsData['semester' . $semesterData->id] = $semesterData->calculationAndGraphicTypeTask;
			}
		}

		$pointsByTypeOfWork['calculationAndGraphicPoints'] = $calculationAndGraphicPointsData;
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
					$controlWorkPoints = isset($moduleData->controlWorkPoints) ? $moduleData->controlWorkPoints : 0;

					$modulesTotalData['module' . $moduleData->moduleId] = $practicalTotal + $labTotal + $seminarTotal + $colloquiumPoints + $controlWorkPoints;
					$semesterTotalPoints += $modulesTotalData['module' . $moduleData->moduleId];
				}
			}

			if (isset($semesterData->calculationAndGraphicTypeTask)) {
				$semesterTotalPoints += $semesterData->calculationAndGraphicTypeTask->points;
			}

			foreach ($semesterData->additionalTasks as $additionalTask) {
				$semesterTotalPoints += $additionalTask->points;
			}

			$semestersTotalData['semester' . $semesterData->id] = $modulesTotalData;
			$semestersTotalData['semester' . $semesterData->id . 'Sum'] = $semesterTotalPoints;
		}
	}

	$pointsByTypeOfWork['totalByModules'] = $semestersTotalData;

	$totalBySemesters = [];

	if (!empty($pointsDistributionRelatedData->semesters)) {
		foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
			if ($semesterData->examTypeId === 0) {
				$examPoints = $pointsDistributionBySemesters[$semesterData->id]['examPoints'] ?? 0;
				$totalBySemesters['semester' . $semesterData->id . 'Sum'] = $pointsByTypeOfWork['totalByModules']['semester' . $semesterData->id . 'Sum'] + $examPoints;
			} else {
				$totalBySemesters['semester' . $semesterData->id . 'Sum'] = $pointsByTypeOfWork['totalByModules']['semester' . $semesterData->id . 'Sum'];
			}
		}
	}

	$pointsByTypeOfWork['totalBySemesters'] = $totalBySemesters;

	return $pointsByTypeOfWork;
}
