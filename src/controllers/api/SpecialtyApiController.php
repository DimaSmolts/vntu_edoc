<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/SpecialtyService.php';

use App\Controllers\BaseController;
use App\Services\SpecialtyService;

class SpecialtyApiController extends BaseController
{
	protected SpecialtyService $specialtyService;

	function __construct()
	{
		$this->specialtyService = new SpecialtyService();
	}

	public function searchSpecialties()
	{
		header('Content-Type: application/json');

		$isTeacher = $this->checkIfCurrentUserIsTeacher();

		if (!$isTeacher) {
			echo json_encode([]);
			exit();
		}

		if (isset($_GET['query'])) {
			$query = trim($_GET['query']);

			if (strlen($query) >= 3) {
				$specialties = $this->specialtyService->getSpecialtiesByQuery($query);

				echo json_encode($specialties);
			} else {
				echo json_encode([]);
			}
		}
	}

	public function searchSpecialtiesByIds()
	{
		header('Content-Type: application/json');

		$isTeacher = $this->checkIfCurrentUserIsTeacher();

		if (!$isTeacher) {
			echo json_encode([]);
			exit();
		}

		if (isset(($_GET['ids']))) {
			$ids = json_decode($_GET['ids']);

			$specialties = $this->specialtyService->getSpecialtiesByIds($ids);

			echo json_encode($specialties);
		}
	}
}
