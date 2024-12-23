<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/WorkingProgramGlobalDataService.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\WorkingProgramGlobalDataService;

class WorkingProgramGlobalDataApiController extends BaseController
{
	protected WPService $wpService;
	protected WorkingProgramGlobalDataService $workingProgramGlobalDataService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->workingProgramGlobalDataService = new WorkingProgramGlobalDataService();
	}

	public function updateGlobalData()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$isAdmin = $this->checkIfCurrentUserIsAdmin();

		if (!$isAdmin) {
			$this->showDoNotHaveAccessGlobalDataPage();

			exit();
		}

		$field = $data['field'];
		$value = $data['value'];

		$this->workingProgramGlobalDataService->updateGlobalData($field, $value);
	}

	public function updateWorkingProgramGlobalDataOverwrite()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$wpId = intval($data['wpId']);
		$field = $data['field'];
		$value = $data['value'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$this->workingProgramGlobalDataService->updateWorkingProgramGlobalDataOverwrite($wpId, $field, $value);
		}
	}
}
