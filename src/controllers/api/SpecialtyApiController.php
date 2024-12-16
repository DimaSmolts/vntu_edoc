<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/SpecialtyService.php';

use App\Services\SpecialtyService;

class SpecialtyApiController
{
	protected SpecialtyService $specialtyService;

	function __construct()
	{
		$this->specialtyService = new SpecialtyService();
	}

	public function searchSpecialties()
	{
		header('Content-Type: application/json');

		if (isset($_GET['query'])) {
			$query = trim($_GET['query']);

			if (strlen($query) >= 3) {
				$departments = $this->specialtyService->getSpecialtiesByQuery($query);

				echo json_encode($departments);
			} else {
				echo json_encode([]);
			}
		}
	}

	public function searchSpecialtiesByIds()
	{
		header('Content-Type: application/json');

		if (isset(($_GET['ids']))) {
			$ids = json_decode($_GET['ids']);

			$departments = $this->specialtyService->getSpecialtiesByIds($ids);

			echo json_encode($departments);
		}
	}
}
