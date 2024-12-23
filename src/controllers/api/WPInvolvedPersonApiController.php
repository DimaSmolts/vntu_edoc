<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/WPInvolvedPersonService.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\WPInvolvedPersonService;

class WPInvolvedPersonApiController extends BaseController
{
	protected WPService $wpService;
	protected WPInvolvedPersonService $wpInvolvedPersonService;

	function __construct()
	{
		$this->wpService = new WPService();
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

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$involvedPerson = $this->wpInvolvedPersonService->updateWorkingProgramInvolvedPerson(
				$wpInvolvedPersonId,
				$wpId,
				$personId,
				$involvedPersonRoleId
			);

			echo json_encode((['id' => $involvedPerson->id, 'personId' => $involvedPerson->personId]));
		}
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

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$this->wpInvolvedPersonService->updateWorkingProgramInvolvedPersonDetails(
				$wpInvolvedPersonId,
				$wpId,
				$field,
				$value
			);
		}
	}

	public function deleteWPInvolvedPerson()
	{
		header('Content-Type: application/json');

		$id = $_GET['id'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($id);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$this->wpInvolvedPersonService->deleteWPInvolvedPerson($id);
		}
	}
}
