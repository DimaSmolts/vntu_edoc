<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/FacultyService.php';

use App\Controllers\BaseController;
use App\Services\FacultyService;

class FacultyApiController extends BaseController
{
	protected FacultyService $facultyService;

	function __construct()
	{
		$this->facultyService = new FacultyService();
	}

	public function getFaculties()
	{
		header('Content-Type: application/json');

		$isTeacher = $this->checkIfCurrentUserIsTeacher();

		if (!$isTeacher) {
			echo json_encode([]);
			exit();
		}

		$faculties = $this->facultyService->getFaculties();

		echo json_encode($faculties);
	}
}
