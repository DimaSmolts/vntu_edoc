<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/GlobalWorkingProgramDataService.php';

use App\Services\GlobalWorkingProgramDataService;

class GlobalDataApiController
{
	protected GlobalWorkingProgramDataService $globalWorkingProgramDataService;

	function __construct()
	{
		$this->globalWorkingProgramDataService = new GlobalWorkingProgramDataService();
	}

	public function updateGlobalWPData()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$fieldName = $data['fieldName'];
		$value = $data['value'];

		$this->globalWorkingProgramDataService->updateGlobalWPData($fieldName, $value);
	}
}
