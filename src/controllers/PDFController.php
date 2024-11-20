<?php

namespace App\Controllers;

require_once __DIR__ . '/../services/WPService.php';
require_once __DIR__ . '/../services/PersonService.php';
require_once __DIR__ . '/../services/SemesterService.php';
require_once __DIR__ . '/../services/ModuleService.php';
require_once __DIR__ . '/../models/PersonModel.php';
require_once __DIR__ . '/../models/WPInvolvedPersonModel.php';
require_once __DIR__ . '/../models/WPDetailsModel.php';
require_once __DIR__ . '/../helpers/formatters/getFullFormattedWorkingProgramDataForPDF.php';
require_once __DIR__ . '/../helpers/formatters/getFormattedPersonsData.php';

use App\Services\WPService;
use App\Services\PersonService;
use App\Services\SemesterService;
use App\Services\ModuleService;

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

	public function getPDFData()
	{
		// header('Content-Type: text/json; charset=UTF-8');
		header('Content-Type: text/html; charset=UTF-8');

		$wpId = $_GET['id'];

		$rawDetails = $this->wpService->getWPDetailsForPDF($wpId);
		$details = getFullFormattedWorkingProgramDataForPDF($rawDetails);

		$rawPersons = $this->personService->getPersons();
		$persons = getFormattedPersonsData($rawPersons);

		// print_r($details);

		require __DIR__ . '/../views/pages/pdf.php';
	}
}
