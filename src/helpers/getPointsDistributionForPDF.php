<?php

require_once __DIR__ . '/../models/PDFPointsDistributionModuleModel.php';
require_once __DIR__ . '/../models/PDFPointsDistributionModulesTotalModel.php';
require_once __DIR__ . '/../models/PDFPointsDistributionSemesterModel.php';

use App\Models\PDFPointsDistributionModuleModel;
use App\Models\PDFPointsDistributionModulesTotalModel;
use App\Models\PDFPointsDistributionSemesterModel;

function getPointsDistributionForPDF($pointsDistributionRelatedData)
{
	// Отримуємо всі збережені бали для одного заняття всіх типів та для іспиту 
	$pointsDistribution = isset($pointsDistributionRelatedData->pointsDistribution) ? json_decode($pointsDistributionRelatedData->pointsDistribution, true) : null;

	// Якщо балів немає, то повертаємо null
	if (!isset($pointsDistribution)) {
		return null;
	}

	// Дістаємо бали окремо для всіх типів занять
	$generalPracticalPoints = isset($pointsDistribution['practicalPoints']) ? $pointsDistribution['practicalPoints'] : 0;
	$generalLabPoints = isset($pointsDistribution['labPoints']) ? $pointsDistribution['labPoints'] : 0;
	$generalSeminarPointsPoints = isset($pointsDistribution['seminarPoints']) ? $pointsDistribution['seminarPoints'] : 0;

	// Формуємо масив для семестрів
	$semesters = [];

	if (!empty($pointsDistributionRelatedData->semesters)) {
		foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
			// Формуємо масив для модулів семестру
			$modules = [];

			// Встановлюємо початкові значення для значень колонки Разом
			$modulesTotalPracticalPoints = 0;
			$modulesTotalLabPoints = 0;
			$modulesTotalSeminarPoints = 0;
			$modulesTotalColloquiumPoints = 0;
			$modulesTotalPoints = 0;

			if (!empty($semesterData->modules)) {
				foreach ($semesterData->modules as $moduleData) {
					// Множимо бали на кількість занять для отрмання балів за модуль
					$modulePracticalPoints = $moduleData->practicals * $generalPracticalPoints;
					$moduleLabPoints = $moduleData->labs * $generalLabPoints;
					$moduleSeminarPointsPoints = $moduleData->seminars * $generalSeminarPointsPoints;

					// Дістаємо бали за колоквіум
					$moduleColloquiumPoints = $moduleData->colloquiumPoints ?? 0;

					// Обраховуємо Усього за модуль
					$moduleTotal = $modulePracticalPoints + $moduleLabPoints + $moduleSeminarPointsPoints + $moduleColloquiumPoints;

					// Формуємо модель для даних для модуля
					$modules[] = new PDFPointsDistributionModuleModel(
						$moduleData->moduleId,
						$modulePracticalPoints,
						$moduleLabPoints,
						$moduleSeminarPointsPoints,
						$moduleColloquiumPoints,
						$moduleTotal,
						$moduleData->moduleNumber
					);

					// Додаємо бали за модуль до балів за всі модулі в семестрі (колонка Разом)
					$modulesTotalPracticalPoints += $modulePracticalPoints;
					$modulesTotalLabPoints += $moduleLabPoints;
					$modulesTotalSeminarPoints += $moduleSeminarPointsPoints;
					$modulesTotalColloquiumPoints += $moduleColloquiumPoints;
					$modulesTotalPoints += $moduleTotal;
				}
			}

			// Формуємо модель для значень всіх модулів в семетру в колонку Разом
			$modulesTotal = new PDFPointsDistributionModulesTotalModel(
				$modulesTotalPracticalPoints,
				$modulesTotalLabPoints,
				$modulesTotalSeminarPoints,
				$modulesTotalColloquiumPoints,
				$modulesTotalPoints
			);

			// Дістаємо бали окремо для іспиту
			$generalSeminarPointsPoints = isset($pointsDistribution["examPointsSemester$semesterData->id"]) ? $pointsDistribution["examPointsSemester$semesterData->id"] : 0;

			// Визначаємо загальну суму балів за семестр
			$semesterTotal = $modulesTotalPracticalPoints + $modulesTotalLabPoints + $modulesTotalSeminarPoints + $modulesTotalColloquiumPoints + $generalSeminarPointsPoints;

			$semester = new PDFPointsDistributionSemesterModel(
				$semesterData->id,
				$semesterTotal,
				$semesterData->semesterNumber,
				$semesterData->examTypeId,
				$modules,
				$modulesTotal
			);

			$semesters[] = $semester;
		}
	}

	return [
		'semesters' => $semesters,
		'pointsDistribution' => $pointsDistribution
	];
}
