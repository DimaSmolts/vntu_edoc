<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/SemesterEducationFormService.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\SemesterEducationFormService;

class SemesterEducationFormApiController extends BaseController
{
	protected SemesterEducationFormService $semesterEducationFormService;
	protected WPService $wpService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->semesterEducationFormService = new SemesterEducationFormService();
	}

	public function createSemesterEducationForm()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$educationalDisciplineSemesterId = intval($data['educationalDisciplineSemesterId']);
		$educationalFormId = intval($data['educationalFormId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($educationalDisciplineSemesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$this->semesterEducationFormService->createSemesterEducationForm($educationalDisciplineSemesterId, $educationalFormId);

			echo json_encode(['status' => 'success', 'message' => 'educationalDisciplineSemesterEducationForm was created']);
		}
	}

	public function deleteSemesterEducationForm()
	{
		header('Content-Type: application/json');

		$educationalDisciplineSemesterId = $_GET['educationalDisciplineSemesterId'];
		$educationalFormId = $_GET['educationalFormId'];

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($educationalDisciplineSemesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$this->semesterEducationFormService->deleteSemesterEducationForm($educationalDisciplineSemesterId, $educationalFormId);
		}
	}
}
