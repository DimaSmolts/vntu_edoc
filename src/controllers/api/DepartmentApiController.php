<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/DepartmentService.php';

use App\Services\DepartmentService;

class DepartmentApiController
{
	protected DepartmentService $departmentService;

	function __construct()
	{
		$this->departmentService = new DepartmentService();
	}

	public function searchDepartments()
	{
		header('Content-Type: application/json');

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

		if (isset(($_GET['id']))) {
			$id = intval($_GET['id']);

			$departments = $this->departmentService->getDepartmentsById($id);

			echo json_encode($departments);
		}
	}
}
