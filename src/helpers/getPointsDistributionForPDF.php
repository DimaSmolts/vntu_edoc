<?php

require_once __DIR__ . '/../models/PDFPointsDistributionModuleModel.php';
require_once __DIR__ . '/../models/PDFPointsDistributionModulesTotalModel.php';
require_once __DIR__ . '/../models/PDFPointsDistributionSemesterModel.php';
require_once __DIR__ . '/getTaskId.php';

use App\Models\PDFPointsDistributionModuleModel;
use App\Models\PDFPointsDistributionModulesTotalModel;
use App\Models\PDFPointsDistributionSemesterModel;

function getPointsDistributionForPDF($pointsDistributionRelatedData)
{
	// Формуємо масив для семестрів
	$semesters = [];

	$taskTypeIds = getTaskId();

	if (!empty($pointsDistributionRelatedData->semesters)) {
		foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
			// Отримуємо всі збережені бали для одного заняття всіх типів та для іспиту 
			$pointsDistribution = isset($semesterData->pointsDistribution) ? json_decode($semesterData->pointsDistribution, true) : null;

			$semester = null;

			// Якщо балів немає, то повертаємо нулі
			if (!isset($pointsDistribution)) {
				$semester = new PDFPointsDistributionSemesterModel(
					$semesterData->id,
					0,
					$semesterData->semesterNumber,
					$semesterData->examTypeId,
					[],
					null,
					$semesterData->pointsDistribution ?? ''
				);
			} else {
				// Дістаємо бали окремо для всіх типів занять
				$generalPracticalPoints = isset($pointsDistribution['practicalPoints']) ? $pointsDistribution['practicalPoints'] : 0;
				$generalLabPoints = isset($pointsDistribution['labPoints']) ? $pointsDistribution['labPoints'] : 0;
				$generalSeminarPointsPoints = isset($pointsDistribution['seminarPoints']) ? $pointsDistribution['seminarPoints'] : 0;

				// Формуємо масив для модулів семестру
				$modules = [];

				// Встановлюємо початкові значення для значень колонки Разом
				$modulesTotalPracticalPoints = 0;
				$modulesTotalLabPoints = 0;
				$modulesTotalSeminarPoints = 0;
				$modulesTotalColloquiumPoints = 0;
				$modulesTotalControlWorkPoints = 0;
				$modulesTotalPoints = 0;

				if (!empty($semesterData->modules)) {
					foreach ($semesterData->modules as $moduleData) {
						// Множимо бали на кількість занять для отрмання балів за модуль
						$modulePracticalPoints = $moduleData->practicals * $generalPracticalPoints;
						$moduleLabPoints = $moduleData->labs * $generalLabPoints;
						$moduleSeminarPointsPoints = $moduleData->seminars * $generalSeminarPointsPoints;

						// Дістаємо бали за колоквіум
						$moduleColloquiumPoints = $moduleData->colloquiumPoints ?? 0;

						// Дістаємо бали за контрольну роботу
						$moduleControlWorkPoints = $moduleData->controlWorkPoints ?? 0;

						// Обраховуємо Усього за модуль
						$moduleTotal = $modulePracticalPoints + $moduleLabPoints + $moduleSeminarPointsPoints + $moduleColloquiumPoints + $moduleControlWorkPoints;

						// Формуємо модель для даних для модуля
						$modules[] = new PDFPointsDistributionModuleModel(
							$moduleData->moduleId,
							$modulePracticalPoints,
							$moduleLabPoints,
							$moduleSeminarPointsPoints,
							$moduleData->isColloquiumExists,
							$moduleColloquiumPoints,
							$moduleData->isControlWorkExists,
							$moduleControlWorkPoints,
							$moduleTotal,
							$moduleData->moduleNumber
						);

						// Додаємо бали за модуль до балів за всі модулі в семестрі (колонка Разом)
						$modulesTotalPracticalPoints += $modulePracticalPoints;
						$modulesTotalLabPoints += $moduleLabPoints;
						$modulesTotalSeminarPoints += $moduleSeminarPointsPoints;
						$modulesTotalColloquiumPoints += $moduleColloquiumPoints;
						$modulesTotalControlWorkPoints += $moduleControlWorkPoints;
						$modulesTotalPoints += $moduleTotal;
					}
				}

				// Встановлюємо початкові значення для РГР та РГЗ
				$calculationAndGraphicWorkPoints = null;
				$calculationAndGraphicTaskPoints = null;

				if (isset($semesterData->calculationAndGraphicTypeTask)) {
					if ($semesterData->calculationAndGraphicTypeTask->taskTypeId == $taskTypeIds->calculationAndGraphicWork) {
						$calculationAndGraphicWorkPoints = $semesterData->calculationAndGraphicTypeTask->points;
						$modulesTotalPoints += $calculationAndGraphicWorkPoints;
					} else {
						$calculationAndGraphicTaskPoints = $semesterData->calculationAndGraphicTypeTask->points;
						$modulesTotalPoints += $calculationAndGraphicTaskPoints;
					}
				}

				// Обробляємо додаткові завдання 
				foreach ($semesterData->additionalTasks as $additionalTask) {
					$modulesTotalPoints += $additionalTask->points ?? 0;
				}

				// Формуємо модель для значень всіх модулів в семетру в колонку Разом
				$modulesTotal = new PDFPointsDistributionModulesTotalModel(
					$modulesTotalPracticalPoints,
					$modulesTotalLabPoints,
					$modulesTotalSeminarPoints,
					$modulesTotalColloquiumPoints,
					$modulesTotalControlWorkPoints,
					$modulesTotalPoints
				);

				// Дістаємо бали окремо для іспиту
				$points = json_decode($semesterData->pointsDistribution, true);
				$examPoints = $points['examPoints'] ?? 0;

				// Визначаємо загальну суму балів за семестр
				$semesterTotal = $modulesTotalPoints + $examPoints;

				$semester = new PDFPointsDistributionSemesterModel(
					$semesterData->id,
					$semesterTotal,
					$semesterData->semesterNumber,
					$semesterData->examTypeId,
					$modules,
					$modulesTotal,
					$semesterData->pointsDistribution ?? '',
					$calculationAndGraphicWorkPoints,
					$calculationAndGraphicTaskPoints
				);
			}

			$semesters[] = $semester;
		}
	};

	return $semesters;
}
