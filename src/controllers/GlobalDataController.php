<?php

namespace App\Controllers;

require_once __DIR__ . '/../services/GlobalWorkingProgramDataService.php';

use App\Services\GlobalWorkingProgramDataService;

class GlobalDataController
{
	protected GlobalWorkingProgramDataService $globalWorkingProgramDataService;

	function __construct()
	{
		$this->globalWorkingProgramDataService = new GlobalWorkingProgramDataService();
	}

	public function getGlobalWPData()
	{
		header('Content-Type: text/html');

		$rawGlobalWPData = $this->globalWorkingProgramDataService->getGlobalWPData();

		$data = getFullFormattedGlobalWorkingProgramData($rawGlobalWPData);

		$showReturnBtn = true;
		$isAbleToEditGlobalData = false;
		require __DIR__ . '/../views/pages/globalDataPage.php';
	}
}
