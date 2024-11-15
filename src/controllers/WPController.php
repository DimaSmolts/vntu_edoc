<?php

namespace App\Controllers;

require_once __DIR__ . '/../services/WP.php';
require_once __DIR__ . '/../services/PersonService.php';
require_once __DIR__ . '/../services/SemesterService.php';
require_once __DIR__ . '/../services/ModuleService.php';
require_once __DIR__ . '/../helpers/getFormattedFullSemestersData.php';

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

		$semestersData = getFormattedFullSemestersData($rawSemestersData);

		$filteredCreatedBy = array_filter($wpInvolvedPersons, function ($persons) {
			return $persons->involvedPersonRoleId === 'Розроблено';
		});

		$createdBy = reset($filteredCreatedBy);
		$showReturnBtn = true;
		require __DIR__ . '/../views/pages/wpDetailsPage.php';
	}
}
