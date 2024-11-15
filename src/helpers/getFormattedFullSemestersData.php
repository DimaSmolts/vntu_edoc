<?php

function getFormattedFullSemestersData($semestersData)
{
	$formattedSemesterData = [];

	foreach ($semestersData as $semesterData) {
		$semesterIndex = array_search($semesterData["id"], array_column($formattedSemesterData, "id"));

		if ($semesterIndex === false) {
			$formattedSemesterData[] = [
				"id" => $semesterData["id"],
				"semesterNumber" => $semesterData["semesterNumber"],
				"examType" => $semesterData["examType"],
				"modules" => []
			];
			$semesterIndex = count($formattedSemesterData) - 1;
		}

		if ($semesterData["moduleId"] !== null) {
			$moduleIndex = array_search(
				$semesterData["moduleId"],
				array_column($formattedSemesterData[$semesterIndex]["modules"], "moduleId")
			);

			if ($moduleIndex === false) {
				$formattedSemesterData[$semesterIndex]["modules"][] = [
					"moduleId" => $semesterData["moduleId"],
					"moduleName" => $semesterData["moduleName"],
					"moduleNumber" => $semesterData["moduleNumber"],
					"themes" => []
				];
				$moduleIndex = count($formattedSemesterData[$semesterIndex]["modules"]) - 1;
			}

			if ($semesterData["themeId"] !== null) {
				$formattedSemesterData[$semesterIndex]["modules"][$moduleIndex]["themes"][] = [
					"themeId" => $semesterData["themeId"],
					"themeName" => $semesterData["themeName"],
					"themeDescription" => $semesterData["themeDescription"],
					"themeNumber" => $semesterData["themeNumber"]
				];
			}
		}
	}

	foreach ($formattedSemesterData as &$semester) {
		$semester["modules"] = array_filter($semester["modules"], function ($module) {
			return !empty($module["themes"]);
		});
	}

	return $formattedSemesterData;
}
