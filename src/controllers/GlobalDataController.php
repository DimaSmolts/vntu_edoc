<?php

namespace App\Controllers;

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../services/WorkingProgramGlobalDataService.php';
require_once __DIR__ . '/../services/AssessmentCriteriaService.php';
require_once __DIR__ . '/../helpers/formatters/getFullFormattedWorkingProgramGlobalData.php';
require_once __DIR__ . '/../helpers/formatters/getFullFormattedAssessmentCriteriasForGlobalData.php';

use App\Controllers\BaseController;
use App\Services\WorkingProgramGlobalDataService;
use App\Services\AssessmentCriteriaService;

class GlobalDataController extends BaseController
{
	protected WorkingProgramGlobalDataService $workingProgramGlobalDataService;
	protected AssessmentCriteriaService $assessmentCriteriaService;

	function __construct()
	{
		$this->workingProgramGlobalDataService = new WorkingProgramGlobalDataService();
		$this->assessmentCriteriaService = new AssessmentCriteriaService();
	}

	public function getWorkingProgramGlobalData()
	{
		header('Content-Type: text/html');

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

		$isAdmin = $this->checkIfCurrentUserIsAdmin();

		if (!$isAdmin) {
			$this->showDoNotHaveAccessGlobalDataPage();

			exit();
		}

		$isLoggedIn = true;
		$showReturnBtn = true;
		$showEditGlobalDataBtn = false;

		$rawGlobalWPData = $this->workingProgramGlobalDataService->getWorkingProgramGlobalData();

		$rawDefaultAssessmentCriterias = $this->assessmentCriteriaService->getDefaultAssessmentCriterias();

		$data = getFullFormattedWorkingProgramGlobalData($rawGlobalWPData);
		$assessmentCriterias = getFullFormattedAssessmentCriteriasForGlobalData($rawDefaultAssessmentCriterias);

		require __DIR__ . '/../views/pages/globalDataPage.php';
	}
}
