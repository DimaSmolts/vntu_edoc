<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/SubjectTypeService.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedSubjectTypeData.php';

use App\Controllers\BaseController;
use App\Services\SubjectTypeService;

class SubjectTypeApiController extends BaseController
{
	protected SubjectTypeService $subjectTypeService;

	function __construct()
	{
		$this->subjectTypeService = new SubjectTypeService();
	}

	public function getSubjectTypes()
	{
		header('Content-Type: application/json');

		$isTeacher = $this->checkIfCurrentUserIsTeacher();

		if (!$isTeacher) {
			echo json_encode([]);
			exit();
		}

		$rawSubjectTypes = $this->subjectTypeService->getSubjectTypes();
		$subjectTypes = getFormattedSubjectTypeData($rawSubjectTypes);

		echo json_encode($subjectTypes);
	}
}
