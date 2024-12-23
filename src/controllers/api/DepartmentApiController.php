<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/DepartmentService.php';

use App\Controllers\BaseController;
use App\Services\DepartmentService;

class DepartmentApiController extends BaseController
{
	protected DepartmentService $departmentService;

	function __construct()
	{
		$this->departmentService = new DepartmentService();
	}

	public function searchDepartments()
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
				$departments = $this->departmentService->getDepartmentsByQuery($query);

				echo json_encode($departments);
			} else {
				echo json_encode([]);
			}
		}
	}

	public function searchDepartmentsById()
	{
		header('Content-Type: application/json');

		$isTeacher = $this->checkIfCurrentUserIsTeacher();

		if (!$isTeacher) {
			echo json_encode([]);
		}

		if (isset(($_GET['id']))) {
			$id = intval($_GET['id']);

			$departments = $this->departmentService->getDepartmentsById($id);

			echo json_encode($departments);
		}
	}
}
