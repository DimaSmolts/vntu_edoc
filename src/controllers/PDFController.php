<?php

namespace App\Controllers;

require_once __DIR__ . '/../services/WP.php';
require_once __DIR__ . '/../services/PersonService.php';
require_once __DIR__ . '/../services/SemesterService.php';
require_once __DIR__ . '/../services/ModuleService.php';
require_once __DIR__ . '/../models/PersonModel.php';
require_once __DIR__ . '/../models/WPInvolvedPersonModel.php';
require_once __DIR__ . '/../models/WPDetailsModel.php';

use App\Services\WPService;
use App\Services\PersonService;
use App\Services\SemesterService;
use App\Services\ModuleService;
use App\Models\PersonModel;
use App\Models\WPInvolvedPersonModel;
use App\Models\WPDetailsModel;

class PDFController
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
					"moduleAmount" => $semesterData["moduleAmount"],
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

	public function getPDFData()
	{
		header('Content-Type: text/html; charset=UTF-8');

		$wpId = $_GET['id'];

		$rawDetails = $this->wpService->getWPDetails($wpId);

		$details = new WPDetailsModel(
			$rawDetails['id'],
			$rawDetails['regularYear'],
			$rawDetails['academicYear'],
			$rawDetails['facultyName'],
			$rawDetails['departmentName'],
			$rawDetails['disciplineName'],
			$rawDetails['degreeName'],
			$rawDetails['fielfOfStudyIdx'],
			$rawDetails['fielfOfStudyName'],
			$rawDetails['specialtyIdx'],
			$rawDetails['specialtyName'],
			$rawDetails['educationalProgram'],
			$rawDetails['notes'],
			$rawDetails['language'],
			$rawDetails['prerequisites'],
			$rawDetails['goal'],
			$rawDetails['tasks'],
			$rawDetails['competences'],
			$rawDetails['programResults'],
			$rawDetails['controlMeasures']
		);

		$rawPersons = $this->personService->getPersons();

		$persons = [];

		foreach ($rawPersons as $rawPerson) {
			$persons[] = new PersonModel(
				$rawPerson['id'],
				$rawPerson['surname'],
				$rawPerson['name'],
				$rawPerson['patronymicName'],
				$rawPerson['degree']
			);
		}

		$rawWpInvolvedPersons = $this->personService->getWorkingProgramInvolvedPersons($wpId);

		$wpInvolvedPersons = [];

		foreach ($rawWpInvolvedPersons as $rawWpInvolvedPerson) {
			$wpInvolvedPersons[] = new WPInvolvedPersonModel(
				$rawWpInvolvedPerson['workingProgramInvolvedPersonsId'],
				$rawWpInvolvedPerson['personId'],
				$rawWpInvolvedPerson['role']
			);
		}
		$rawSemestersData = $this->semesterService->getSemestersByWPId($wpId);

		$semestersData = $this->formatSemesterData($rawSemestersData);

		$modulesAmount = 0;

		foreach ($semestersData as $semester) {
			$modulesAmount += $semester["moduleAmount"];
		}

		$filteredCreatedBy = array_filter($wpInvolvedPersons, function ($person) {
			return $person->involvedPersonRoleId === 'Розроблено';
		});

		$createdBy = reset($filteredCreatedBy);

		$createdByPerson = array_filter($persons, function ($person) use ($createdBy) {
			return $person->id === $createdBy->involvedPersonId;
		});

		require __DIR__ . '/../views/pages/pdf.php';
	}
}
