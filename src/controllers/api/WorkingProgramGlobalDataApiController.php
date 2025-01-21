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
}
