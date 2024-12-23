<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/TeacherService.php';

use App\Controllers\BaseController;
use App\Services\TeacherService;

class TeacherApiController extends BaseController
{
	protected TeacherService $teacherService;

	function __construct()
	{
		$this->teacherService = new TeacherService();
	}

	public function searchTeachers()
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
				$teachers = $this->teacherService->getTeachersByQuery($query);

				echo json_encode($teachers);
			} else {
				echo json_encode([]);
			}
		}
	}

	public function searchTeacherById()
	{
		header('Content-Type: application/json');

		$isTeacher = $this->checkIfCurrentUserIsTeacher();

		if (!$isTeacher) {
			echo json_encode([]);
			exit();
		}

		if (isset(($_GET['id']))) {
			$id = json_decode($_GET['id']);

			$teacher = $this->teacherService->getTeacherById($id);

			echo json_encode($teacher);
		}
	}

	public function searchTeachersByIds()
	{
		header('Content-Type: application/json');

		$isTeacher = $this->checkIfCurrentUserIsTeacher();

		if (!$isTeacher) {
			echo json_encode([]);
			exit();
		}

		if (isset(($_GET['ids']))) {
			$ids = json_decode($_GET['ids']);

			$teachers = $this->teacherService->getTeachersByIds($ids);

			echo json_encode($teachers);
		}
	}
}
