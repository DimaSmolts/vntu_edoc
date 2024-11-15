<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/ModuleService.php';

use App\Services\ModuleService;

class ModuleApiController
{
	protected ModuleService $moduleService;

	function __construct()
	{
		$this->moduleService = new ModuleService();
	}

	public function createNewModule()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$semesterId = intval($data['semesterId']);

		$newModuleId = $this->moduleService->createNewModule($semesterId);

		echo json_encode(['status' => 'success', 'moduleId' => $newModuleId]);
	}

	public function updateModule()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$id = intval($data['id']);
		$field = $data['field'];
		$value = $data['value'];

		$this->moduleService->updateModule($id, $field, $value);
	}
}
