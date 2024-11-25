<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/WorkingProgramLiteratureService.php';

use App\Services\WorkingProgramLiteratureService;

class WorkingProgramLiteratureApiController
{
	protected WorkingProgramLiteratureService $workingProgramLiteratureService;

	function __construct()
	{
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

		$this->workingProgramLiteratureService->updateWPLiterature($wpId, $field, $value);
	}
}
