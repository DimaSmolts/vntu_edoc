<?php

namespace App\Controllers;

require_once __DIR__ . '/../services/WorkingProgramGlobalDataOverwriteService.php';

use App\Services\WorkingProgramGlobalDataOverwriteService;

class GlobalDataController
{
	protected WorkingProgramGlobalDataOverwriteService $workingProgramGlobalDataOverwriteService;

	function __construct()
	{
		$this->workingProgramGlobalDataOverwriteService = new WorkingProgramGlobalDataOverwriteService();
	}

	public function getWorkingProgramGlobalData()
	{
		header('Content-Type: text/html');

		$rawGlobalWPData = $this->workingProgramGlobalDataOverwriteService->getWorkingProgramGlobalData();

		$data = getFullFormattedWorkingProgramGlobalData($rawGlobalWPData);

		$showReturnBtn = true;
		$isAbleToEditGlobalData = false;
		require __DIR__ . '/../views/pages/globalDataPage.php';
	}
}
