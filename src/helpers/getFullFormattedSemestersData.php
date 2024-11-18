<?php

require_once __DIR__ . '/../models/SemesterModel.php';
require_once __DIR__ . '/../models/ModuleModel.php';
require_once __DIR__ . '/../models/ThemeModel.php';

use App\Models\SemesterModel;
use App\Models\ModuleModel;
use App\Models\ThemeModel;

function getFullFormattedSemestersData($semestersData)
{
	$formattedSemesterData = [];

	foreach ($semestersData as $semesterData) {
		// Знаходимо семестр або створюємо новий запис
		$semesterIndex = array_search($semesterData["id"], array_column($formattedSemesterData, 'id'));

		if ($semesterIndex === false) {
			$formattedSemesterData[] = new SemesterModel(
				$semesterData["id"],
				$semesterData["semesterNumber"],
				$semesterData["examType"] ?? ''
			);
			$semesterIndex = count($formattedSemesterData) - 1;
		}

		$semester = $formattedSemesterData[$semesterIndex];

		// Якщо семестр має модулі, то додаємо їх
		if ($semesterData["moduleId"] !== null) {
			$moduleIndex = array_search(
				$semesterData["moduleId"],
				array_column($semester->modules, 'moduleId')
			);

			if ($moduleIndex === false) {
				$semester->modules[] = new ModuleModel(
					$semesterData["moduleId"],
					$semesterData["moduleName"] ?? '',
					$semesterData["moduleNumber"]
				);
				$moduleIndex = count($semester->modules) - 1;
			}

			$module = $semester->modules[$moduleIndex];

			// Якщо модуль має теми, то додаємо їх до модуля
			if ($semesterData["themeId"] !== null) {
				$module->themes[] = new ThemeModel(
					$semesterData["themeId"],
					$semesterData["themeName"] ?? '',
					$semesterData["themeDescription"] ?? '',
					$semesterData["themeNumber"]
				);
			}
		}
	}

	return $formattedSemesterData;
}
