<?php

namespace App\Controllers;

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../services/WPService.php';
require_once __DIR__ . '/../services/SemesterService.php';
require_once __DIR__ . '/../services/ModuleService.php';
require_once __DIR__ . '/../models/WPInvolvedPersonModel.php';
require_once __DIR__ . '/../models/WPDetailsModel.php';
require_once __DIR__ . '/../helpers/formatters/getFullFormattedWorkingProgramDataForPDF.php';
require_once __DIR__ . '/../helpers/getSemestersIdsByControlType.php';
require_once __DIR__ . '/../helpers/getPointsDistributionForPDF.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\SemesterService;
use App\Services\ModuleService;

class PDFController extends BaseController
{
	protected WPService $wpService;
	protected SemesterService $semesterService;
	protected ModuleService $moduleService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->semesterService = new SemesterService();
		$this->moduleService = new ModuleService();
	}

	public function getPDFData()
	{
		$isLoggedIn = $this->checkIfUserLoggedIn();

		if (!$isLoggedIn) {
			$this->showDoNotHaveAccessPage($isLoggedIn);

			exit();
		}

		$isTeacher = $this->checkIfCurrentUserIsTeacher();

		if (!$isTeacher) {
			$this->showDoNotHaveAccessPage($isLoggedIn);

			exit();
		}

		$wpId = $_GET['id'];
		$isHighlighting = isset($_GET['highlight']) ? $_GET['highlight'] : false;
		$isData = isset($_GET['data']) ? $_GET['data'] : false;

		$rawDetails = $this->wpService->getWPDetailsForPDF($wpId);

		if ($isData) {
			header('Content-Type: text/json; charset=UTF-8');
			print_r($rawDetails);
		} else {
			header('Content-Type: text/html; charset=UTF-8');

			$ifCurrentUserHasAccessToWP  = $this->checkIfCurrentUserHasAccessToWP($rawDetails->creator->id);

			if ($ifCurrentUserHasAccessToWP) {
				$details = getFullFormattedWorkingProgramDataForPDF($rawDetails);

				$pointsDistributionRelatedData = getFormattedPointsDistributionRelatedData($rawDetails);
				$pointsDistributionSemestersData = getPointsDistributionForPDF($pointsDistributionRelatedData);
				$structure = getFormattedLessonsAndExamingsStructure($rawDetails);
				$semestersIdsByControlType = getSemestersIdsByControlType($pointsDistributionRelatedData);

				require __DIR__ . '/../views/pages/pdf.php';
				exit();
			} else {
				$this->showDoNotHaveAccessDetailsPage();

				exit();
			}
		}
	}
}
