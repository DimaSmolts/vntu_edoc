<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/FacultyService.php';

use App\Services\FacultyService;

class FacultyApiController
{
	protected FacultyService $facultyService;

	function __construct()
	{
		$this->facultyService = new FacultyService();
	}


	public function getFaculties()
	{
		header('Content-Type: application/json');

		$faculties = $this->facultyService->getFaculties();

		echo json_encode($faculties);
	}
}
