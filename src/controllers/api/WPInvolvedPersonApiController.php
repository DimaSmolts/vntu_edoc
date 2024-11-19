<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/WPInvolvedPersonService.php';

use App\Services\WPInvolvedPersonService;

class WPInvolvedPersonApiController
{
	protected WPInvolvedPersonService $wpInvolvedPersonService;

	function __construct()
	{
		$this->wpInvolvedPersonService = new WPInvolvedPersonService();
	}

	public function updateWorkingProgramInvolvedPerson()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$wpInvolvedPersonId = intval($data['wpInvolvedPersonId']) ?? NULL;
		$wpId = intval($data['wpId']);
		$personId = intval($data['personId']);
		$involvedPersonRoleId = intval($data['roleId']);

		$this->wpInvolvedPersonService->updateWorkingProgramInvolvedPerson($wpInvolvedPersonId, $wpId, $personId, $involvedPersonRoleId);
	}
}
