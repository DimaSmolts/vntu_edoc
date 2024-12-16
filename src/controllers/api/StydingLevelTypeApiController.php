<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/StydingLevelTypeApiService.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedStydingLevelTypeData.php';

use App\Services\StydingLevelTypeApiService;

class StydingLevelTypeApiController
{
	protected StydingLevelTypeApiService $stydingLevelTypeApiService;

	function __construct()
	{
		$this->stydingLevelTypeApiService = new StydingLevelTypeApiService();
	}


	public function getStydingLevelTypes()
	{
		header('Content-Type: application/json');

		$rawStydingLevelTypes = $this->stydingLevelTypeApiService->getStydingLevelTypes();
		$stydingLevelTypes = getFormattedStydingLevelTypeData($rawStydingLevelTypes);

		echo json_encode($stydingLevelTypes);
	}
}
