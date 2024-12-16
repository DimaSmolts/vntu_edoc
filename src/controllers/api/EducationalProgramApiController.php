<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/EducationalProgramService.php';

use App\Services\EducationalProgramService;

class EducationalProgramApiController
{
	protected EducationalProgramService $educationalProgramService;

	function __construct()
	{
		$this->educationalProgramService = new EducationalProgramService();
	}

	public function searchEducationalPrograms()
	{
		header('Content-Type: application/json');

		if (isset($_GET['query'])) {
			$query = trim($_GET['query']);

			if (strlen($query) >= 3) {
				$educationalPrograms = $this->educationalProgramService->getEducationalProgramsByQuery($query);

				echo json_encode($educationalPrograms);
			} else {
				echo json_encode([]);
			}
		}
	}

	public function searchEducationalProgramsByIds()
	{
		header('Content-Type: application/json');

		if (isset(($_GET['ids']))) {
			$ids = json_decode($_GET['ids']);

			$educationalPrograms = $this->educationalProgramService->getEducationalProgramsByIds($ids);

			echo json_encode($educationalPrograms);
		}
	}
}
