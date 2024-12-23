<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/WorkingProgramLiteratureService.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\WorkingProgramLiteratureService;

class WorkingProgramLiteratureApiController extends BaseController
{
	protected WPService $wpService;
	protected WorkingProgramLiteratureService $workingProgramLiteratureService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->workingProgramLiteratureService = new WorkingProgramLiteratureService();
	}

	public function updateWPLiterature()
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
			$this->workingProgramLiteratureService->updateWPLiterature($wpId, $field, $value);
		}
	}
}
