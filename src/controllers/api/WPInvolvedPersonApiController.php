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

		$id = $this->wpInvolvedPersonService->updateWorkingProgramInvolvedPerson(
			$wpInvolvedPersonId,
			$wpId,
			$personId,
			$involvedPersonRoleId
		);

		echo json_encode((['id' => $id]));
	}

	public function updateWorkingProgramInvolvedPersonDetails()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$wpInvolvedPersonId = intval($data['wpInvolvedPersonId']) ?? NULL;
		$wpId = intval($data['wpId']);
		$field = $data['field'];
		$value = $data['value'];

		$this->wpInvolvedPersonService->updateWorkingProgramInvolvedPersonDetails(
			$wpInvolvedPersonId,
			$wpId,
			$field,
			$value
		);
	}

	public function deleteWPInvolvedPerson()
	{
		header('Content-Type: application/json');

		$id = $_GET['id'];

		$this->wpInvolvedPersonService->deleteWPInvolvedPerson($id);
	}
}
