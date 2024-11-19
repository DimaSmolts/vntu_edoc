<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/SemesterEducationFormService.php';

use App\Services\SemesterEducationFormService;

class SemesterEducationFormApiController
{
	protected SemesterEducationFormService $semesterEducationFormService;

	function __construct()
	{
		$this->semesterEducationFormService = new SemesterEducationFormService();
	}

	public function createSemesterEducationForm()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$educationalDisciplineSemesterId = intval($data['educationalDisciplineSemesterId']);
		$educationalFormId = intval($data['educationalFormId']);

		$this->semesterEducationFormService->createSemesterEducationForm($educationalDisciplineSemesterId, $educationalFormId);

		echo json_encode(['status' => 'success', 'message' => 'educationalDisciplineSemesterEducationForm was created']);
	}

	public function deleteSemesterEducationForm()
	{
		header('Content-Type: application/json');

		$educationalDisciplineSemesterId = $_GET['educationalDisciplineSemesterId'];
		$educationalFormId = $_GET['educationalFormId'];

		$this->semesterEducationFormService->deleteSemesterEducationForm($educationalDisciplineSemesterId, $educationalFormId);
	}
}
