<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/EducationalProgramService.php';

use App\Controllers\BaseController;
use App\Services\EducationalProgramService;

class EducationalProgramApiController extends BaseController
{
	protected EducationalProgramService $educationalProgramService;

	function __construct()
	{
		$this->educationalProgramService = new EducationalProgramService();
	}

	public function searchEducationalPrograms()
	{
		header('Content-Type: application/json');

		$isTeacher = $this->checkIfCurrentUserIsTeacher();

		if (!$isTeacher) {
			echo json_encode([]);
			exit();
		}

		if (isset($_GET['query'])) {
			$query = trim($_GET['query']);
			$specialtyId = intval($_GET['specialtyId']);

			if (strlen($query) >= 3) {
				$educationalPrograms = $this->educationalProgramService->getEducationalProgramsByQuery($query, $specialtyId);

				echo json_encode($educationalPrograms);
			} else {
				echo json_encode([]);
			}
		}
	}

	public function searchEducationalProgramsByIds()
	{
		header('Content-Type: application/json');

		$isTeacher = $this->checkIfCurrentUserIsTeacher();

		if (!$isTeacher) {
			echo json_encode([]);
			exit();
		}

		if (isset(($_GET['ids']))) {
			$ids = json_decode($_GET['ids']);

			$educationalPrograms = $this->educationalProgramService->getEducationalProgramsByIds($ids);

			echo json_encode($educationalPrograms);
		}
	}
}
