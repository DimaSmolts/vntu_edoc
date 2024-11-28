<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/WorkingProgramGlobalDataOverwriteService.php';

use App\Services\WorkingProgramGlobalDataOverwriteService;

class WorkingProgramGlobalDataOverwriteApiController
{
	protected WorkingProgramGlobalDataOverwriteService $workingProgramGlobalDataOverwriteService;

	function __construct()
	{
		$this->workingProgramGlobalDataOverwriteService = new WorkingProgramGlobalDataOverwriteService();
	}

	public function updateGlobalData()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$field = $data['field'];
		$value = $data['value'];

		$this->workingProgramGlobalDataOverwriteService->updateGlobalData($field, $value);
	}

	public function updateWorkingProgramGlobalDataOverwrite()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$wpId = intval($data['wpId']);
		$field = $data['field'];
		$value = $data['value'];

		$this->workingProgramGlobalDataOverwriteService->updateWorkingProgramGlobalDataOverwrite($wpId, $field, $value);
	}
}
