<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/ModuleService.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\ModuleService;

class ModuleApiController extends BaseController
{
	protected WPService $wpService;
	protected ModuleService $moduleService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->moduleService = new ModuleService();
	}

	public function createNewModule()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$semesterId = intval($data['semesterId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($semesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$newModuleId = $this->moduleService->createNewModule($semesterId);

			echo json_encode(['status' => 'success', 'moduleId' => $newModuleId]);
		}
	}

	public function updateModule()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$id = intval($data['id']);
		$field = $data['field'];
		$value = $data['value'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByModuleId($id);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$this->moduleService->updateModule($id, $field, $value);
		}
	}

	public function deleteModule()
	{
		header('Content-Type: application/json');

		$id = $_GET['id'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByModuleId($id);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$this->moduleService->deleteModule($id);
		}
	}
}
