<?php

namespace App\Controllers;

require_once __DIR__ . '/../services/WP.php';
require_once __DIR__ . '/../services/PersonService.php';
require_once __DIR__ . '/../services/SemesterService.php';
require_once __DIR__ . '/../services/ModuleService.php';
require_once __DIR__ . '/../models/PersonModel.php';
require_once __DIR__ . '/../models/WPInvolvedPersonModel.php';
require_once __DIR__ . '/../models/WPListItemModel.php';
require_once __DIR__ . '/../models/WPDetailsModel.php';
require_once __DIR__ . '/../helpers/getFullFormattedSemestersData.php';

use App\Services\WPService;
use App\Services\PersonService;
use App\Services\SemesterService;
use App\Services\ModuleService;
use App\Models\PersonModel;
use App\Models\WPInvolvedPersonModel;
use App\Models\WPListItemModel;
use App\Models\WPDetailsModel;

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

	public function getWPListItems()
	{
		header('Content-Type: text/html');

		$rawItems = $this->wpService->getWPList();
		$items = [];

		foreach ($rawItems as $rawItem) {
			$items[] = new WPListItemModel(
				$rawItem['id'],
				$rawItem['disciplineName'],
				$rawItem['createdAt']
			);
		}
		$showReturnBtn = false;
		require __DIR__ . '/../views/pages/wpListPage.php';
	}

	public function getWPDetails()
	{
		header('Content-Type: text/html');

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

		$semestersData = getFullFormattedSemestersData($rawSemestersData);

		$filteredCreatedBy = array_filter($wpInvolvedPersons, function ($persons) {
			return $persons->involvedPersonRoleId === 'Розроблено';
		});

		$createdBy = reset($filteredCreatedBy);
		$showReturnBtn = true;
		require __DIR__ . '/../views/pages/wpDetailsPage.php';
	}
}
