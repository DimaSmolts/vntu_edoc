<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/StydingLevelTypeApiService.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedStydingLevelTypeData.php';

use App\Controllers\BaseController;
use App\Services\StydingLevelTypeApiService;

class StydingLevelTypeApiController extends BaseController
{
	protected StydingLevelTypeApiService $stydingLevelTypeApiService;

	function __construct()
	{
		$this->stydingLevelTypeApiService = new StydingLevelTypeApiService();
	}


	public function getStydingLevelTypes()
	{
		header('Content-Type: application/json');

		$isTeacher = $this->checkIfCurrentUserIsTeacher();

		if (!$isTeacher) {
			echo json_encode([]);
			exit();
		}

		$rawStydingLevelTypes = $this->stydingLevelTypeApiService->getStydingLevelTypes();
		$stydingLevelTypes = getFormattedStydingLevelTypeData($rawStydingLevelTypes);

		echo json_encode($stydingLevelTypes);
	}
}
