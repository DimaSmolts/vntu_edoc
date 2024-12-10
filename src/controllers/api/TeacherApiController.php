<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/TeacherService.php';
require_once __DIR__ . '/../../services/WorkingProgramGlobalDataOverwriteService.php';
require_once __DIR__ . '/../../services/WorkingProgramLiteratureService.php';
require_once __DIR__ . '/../../services/DepartmentService.php';
require_once __DIR__ . '/../../helpers/formatters/getFullFormattedWorkingProgramGlobalData.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedLessonsAndExamingsStructure.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedPointsDistributionRelatedData.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedDepartmentsData.php';
require_once __DIR__ . '/../../helpers/getPointsByTypeOfWork.php';
require_once __DIR__ . '/../../helpers/getSemestersWithModulesWithLessons.php';
require_once __DIR__ . '/../../helpers/getSemestersAndModulesIds.php';
require_once __DIR__ . '/../../helpers/getSemestersIdsByControlType.php';

use App\Services\TeacherService;

class TeacherApiController
{
	protected TeacherService $teacherService;

	function __construct()
	{
		$this->teacherService = new TeacherService();
	}

	public function searchTeachers()
	{
		header('Content-Type: application/json');

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
}
