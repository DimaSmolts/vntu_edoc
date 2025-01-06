<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/SemesterService.php';
require_once __DIR__ . '/../../helpers/formatters/getFullFormattedCourseworksAndProjectsData.php';
require_once __DIR__ . '/../../helpers/getTaskId.php';
require_once __DIR__ . '/../../helpers/getIsTypeOfWorkExists.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\SemesterService;

class SemesterApiController extends BaseController
{
	protected WPService $wpService;
	protected SemesterService $semesterService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->semesterService = new SemesterService();
	}

	public function createNewSemester()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$wpId = intval($data['wpId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$newSemesterId = $this->semesterService->createNewSemester($wpId);

			echo json_encode(['status' => 'success', 'semesterId' => $newSemesterId]);
		}
	}

	public function updateSemester()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$id = intval($data['id']);
		$field = $data['field'];
		$value = $data['value'];

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($id);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$this->semesterService->updateSemester($id, $field, $value);
		}
	}

	public function deleteSemester()
	{
		header('Content-Type: application/json');

		$id = $_GET['id'];

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($id);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$this->semesterService->deleteSemester($id);
		}
	}

	public function getCourseworkAndProject()
	{
		header('Content-Type: application/json');

		$wpId = $_GET['id'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$tasksIds = getTaskId();
			$rawSemestersInfo = $this->semesterService->getCourseworksAndProjectsByWPId($wpId, [$tasksIds->coursework, $tasksIds->courseProject]);

			$isCourseworkExists = getIsTypeOfWorkExistsInWP($rawSemestersInfo, $tasksIds->coursework);
			$isCourseProjectExists = getIsTypeOfWorkExistsInWP($rawSemestersInfo, $tasksIds->courseProject);
			$semesters = getFullFormattedCourseworksAndProjectsData($rawSemestersInfo);

			if ($isCourseworkExists || $isCourseProjectExists) {
				$isLoggedIn = true;
				$showReturnBtn = true;
				$showEditGlobalDataBtn = false;

				ob_start();
				include __DIR__ . '/../../views/components/wpDetails/courseworksAndProjectsInfoSlide.php';
				$courseworksAndProjectsInfoSlideContent = ob_get_clean();

				echo json_encode([
					'isCourseTaskExists' => $isCourseworkExists || $isCourseProjectExists,
					'courseworksAndProjectsInfoSlideContent' => $courseworksAndProjectsInfoSlideContent
				]);
			} else {
				echo json_encode([
					'isCourseTaskExists' => $isCourseworkExists || $isCourseProjectExists,
				]);
			}
		}
	}
}
