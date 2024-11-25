<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/GlobalDataForEducationalDisciplineService.php';

use App\Services\GlobalDataForEducationalDisciplineService;

class GlobalDataForEducationalDisciplineApiController
{
	protected GlobalDataForEducationalDisciplineService $globalDataForEducationalDisciplineService;

	function __construct()
	{
		$this->globalDataForEducationalDisciplineService = new GlobalDataForEducationalDisciplineService();
	}

	public function updateGlobalWPDataForEducationalDiscipline()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$wpId = intval($data['wpId']);
		$field = $data['field'];
		$value = $data['value'];

		$this->globalDataForEducationalDisciplineService->updateGlobalWPDataForEducationalDiscipline($wpId, $field, $value);
	}
}
