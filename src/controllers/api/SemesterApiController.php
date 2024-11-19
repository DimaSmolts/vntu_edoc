<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/SemesterService.php';

use App\Services\SemesterService;

class SemesterApiController
{
	protected SemesterService $semesterService;

	function __construct()
	{
		$this->semesterService = new SemesterService();
	}

	public function createNewSemester()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$wpId = intval($data['wpId']);

		$newSemesterId = $this->semesterService->createNewSemester($wpId);

		echo json_encode(['status' => 'success', 'semesterId' => $newSemesterId]);
	}

	public function updateSemester()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$id = intval($data['id']);
		$field = $data['field'];
		$value = $data['value'];

		$this->semesterService->updateSemester($id, $field, $value);
	}

	public function deleteSemester()
	{
		header('Content-Type: application/json');

		$id = $_GET['id'];

		$this->semesterService->deleteSemester($id);
	}
}
