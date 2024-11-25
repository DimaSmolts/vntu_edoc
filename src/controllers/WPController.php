<?php

namespace App\Controllers;

require_once __DIR__ . '/../services/WPService.php';
require_once __DIR__ . '/../services/PersonService.php';
require_once __DIR__ . '/../services/SemesterService.php';
require_once __DIR__ . '/../services/ModuleService.php';
require_once __DIR__ . '/../services/EducationalFormService.php';
require_once __DIR__ . '/../helpers/formatters/getFullFormattedWorkingProgramData.php';
require_once __DIR__ . '/../helpers/formatters/getFormattedWPListData.php';
require_once __DIR__ . '/../helpers/formatters/getFormattedPersonsData.php';
require_once __DIR__ . '/../helpers/formatters/getFormattedEducationalFormData.php';

use App\Services\WPService;
use App\Services\PersonService;
use App\Services\SemesterService;
use App\Services\ModuleService;
use App\Services\EducationalFormService;

class WPController
{
	protected WPService $wpService;
	protected PersonService $personService;
	protected SemesterService $semesterService;
	protected ModuleService $moduleService;
	protected EducationalFormService $educationalFormService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->personService = new PersonService();
		$this->semesterService = new SemesterService();
		$this->moduleService = new ModuleService();
		$this->educationalFormService = new EducationalFormService();
	}

	public function getWPListItems()
	{
		header('Content-Type: text/html');

		$rawItems = $this->wpService->getWPList();

		$items = getFormattedWPListData($rawItems);

		$showReturnBtn = false;
		$isAbleToEditGlobalData = true;
		
		require __DIR__ . '/../views/pages/wpListPage.php';
	}

	public function getWPDetails()
	{
		header('Content-Type: text/html');

		$wpId = $_GET['id'];

		$rawDetails = $this->wpService->getWPDetails($wpId);

		$details = getFullFormattedWorkingProgramData($rawDetails);

		$rawPersons = $this->personService->getPersons();
		$persons = getFormattedPersonsData($rawPersons);

		$rawEducationalForms = $this->educationalFormService->getEducationalForms();
		$educationalForms = getFormattedEducationalFormData($rawEducationalForms);

		$showReturnBtn = true;
		$isAbleToEditGlobalData = false;

		require __DIR__ . '/../views/pages/wpDetailsPage.php';
	}
}
