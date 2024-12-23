<?php

namespace App\Controllers;

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../services/WorkingProgramGlobalDataService.php';

use App\Controllers\BaseController;
use App\Services\WorkingProgramGlobalDataService;

class GlobalDataController extends BaseController
{
	protected WorkingProgramGlobalDataService $workingProgramGlobalDataService;

	function __construct()
	{
		$this->workingProgramGlobalDataService = new WorkingProgramGlobalDataService();
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

		$data = getFullFormattedWorkingProgramGlobalData($rawGlobalWPData);

		require __DIR__ . '/../views/pages/globalDataPage.php';
	}
}
