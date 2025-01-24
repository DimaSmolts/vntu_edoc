<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/StydingLevelTypeService.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedStydingLevelTypeData.php';

use App\Controllers\BaseController;
use App\Services\StydingLevelTypeService;

class StydingLevelTypeApiController extends BaseController
{
	protected StydingLevelTypeService $stydingLevelTypeService;

	function __construct()
	{
		$this->stydingLevelTypeService = new StydingLevelTypeService();
	}

	public function getStydingLevelTypes()
	{
		header('Content-Type: application/json');

		$isTeacher = $this->checkIfCurrentUserIsTeacher();

		if (!$isTeacher) {
			echo json_encode([]);
			exit();
		}

		$rawStydingLevelTypes = $this->stydingLevelTypeService->getStydingLevelTypes();
		$stydingLevelTypes = getFormattedStydingLevelTypeData($rawStydingLevelTypes);

		echo json_encode($stydingLevelTypes);
	}
}
