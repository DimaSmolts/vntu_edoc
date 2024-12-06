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
require_once __DIR__ . '/../helpers/getSemestersIdsByControlType.php';
require_once __DIR__ . '/../helpers/getPointsDistributionForPDF.php';

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
		$wpId = $_GET['id'];
		$isHighlighting = isset($_GET['highlight']) ? $_GET['highlight'] : false;
		$isData = isset($_GET['data']) ? $_GET['data'] : false;

		$rawDetails = $this->wpService->getWPDetailsForPDF($wpId);
		$details = getFullFormattedWorkingProgramDataForPDF($rawDetails);

		$rawPersons = $this->personService->getPersons();
		$persons = getFormattedPersonsData($rawPersons);

		$pointsDistributionRelatedData = getFormattedPointsDistributionRelatedData($rawDetails);
		$pointsDistributionSemestersData = getPointsDistributionForPDF($pointsDistributionRelatedData);
		$structure = getFormattedLessonsAndExamingsStructure($rawDetails);
		$semestersIdsByControlType = getSemestersIdsByControlType($pointsDistributionRelatedData);

		if ($isData) {
			header('Content-Type: text/json; charset=UTF-8');
			print_r($details);
			print_r($pointsDistributionSemestersData);
			print_r($structure);
		} else {
			header('Content-Type: text/html; charset=UTF-8');
			require __DIR__ . '/../views/pages/pdf.php';
		}
	}
}
