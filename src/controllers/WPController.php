<?php

namespace App\Controllers;

require_once __DIR__ . '/../services/WP.php';
require_once __DIR__ . '/../services/PersonService.php';
require_once __DIR__ . '/../services/SemesterService.php';
require_once __DIR__ . '/../services/ModuleService.php';

use App\Services\WPService;
use App\Services\PersonService;
use App\Services\SemesterService;
use App\Services\ModuleService;

class WPController
{
	protected WPService $wpService;
	protected PersonService $personService;
	protected SemesterService $semesterService;
	protected ModuleService $moduleService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->personService = new PersonService();
		$this->semesterService = new SemesterService();
		$this->moduleService = new ModuleService();
	}

	private function formatSemesterData($semestersData)
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


	public function getWPListItems()
	{
		header('Content-Type: text/html');

		$items = $this->wpService->getWPList();
		$showReturnBtn = false;
		require __DIR__ . '/../views/pages/wpListPage.php';
	}

	public function getWPDetails()
	{
		header('Content-Type: text/html');

		$wpId = $_GET['id'];

		$details = $this->wpService->getWPDetails($wpId);
		$persons = $this->personService->getPersons();
		$wpInvolvedPersons = $this->personService->getWorkingProgramInvolvedPersons();
		$rawSemestersData = $this->semesterService->getSemestersByWPId($wpId);

		$semestersData = $this->formatSemesterData($rawSemestersData);

		$filteredCreatedBy = array_filter($wpInvolvedPersons, function ($persons) {
			return $persons->involvedPersonRoleId === 'Розроблено';
		});

		// If you expect only one item to match, you can use reset() to get the first element
		$createdBy = reset($filteredCreatedBy);
		$showReturnBtn = true;
		require __DIR__ . '/../views/pages/wpDetailsPage.php';
	}
}
