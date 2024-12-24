<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/ExamTypeService.php';

use App\Controllers\BaseController;
use App\Services\ExamTypeService;

class ExamTypeApiController extends BaseController
{
	protected ExamTypeService $examTypeService;

	function __construct()
	{
		$this->examTypeService = new ExamTypeService();
	}

	public function getExamTypes()
	{
		header('Content-Type: application/json');

		$isTeacher = $this->checkIfCurrentUserIsTeacher();

		if (!$isTeacher) {
			echo json_encode([]);
			exit();
		}

		$examTypes = $this->examTypeService->getExamTypes();

		echo json_encode($examTypes);
	}
}
