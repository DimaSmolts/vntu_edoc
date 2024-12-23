<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/SemesterService.php';
require_once __DIR__ . '/../../helpers/formatters/getFullFormattedCourseworkData.php';
require_once __DIR__ . '/../../helpers/getIsCourseworkExistsInWP.php';

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

	public function getCoursework()
	{
		header('Content-Type: application/json');

		$wpId = $_GET['id'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$rawSemestersCourseworkInfo = $this->semesterService->getCourseworkHoursByWPId($wpId);
			$semesters = getFullFormattedCourseworkData($rawSemestersCourseworkInfo);
			$isCourseworkExists = getIsCourseworkExistsInWP($semesters);

			if ($isCourseworkExists) {
				$showReturnBtn = true;
				$showEditGlobalDataBtn = false;

				ob_start();
				include __DIR__ . '/../../views/components/wpDetails/courseworkInfoSlide.php';
				$courseworkInfoSlideContent = ob_get_clean();

				echo json_encode([
					'isCourseworkExists' => $isCourseworkExists,
					'courseworkInfoSlideContent' => $courseworkInfoSlideContent
				]);
			} else {
				echo json_encode([
					'isCourseworkExists' => $isCourseworkExists
				]);
			}
		}
	}

	public function updateCourseworkAssesmentComponents()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$id = intval($data['semesterId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($id);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$courseworkAssessmentComponents = json_encode($data['courseworkAssessmentComponents']);

			$this->semesterService->updateCourseworkAssesmentComponents($id, $courseworkAssessmentComponents);
		}
	}

	public function deleteCoursework()
	{
		header('Content-Type: application/json');

		$semesterId = $_GET['semesterId'];

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($semesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$this->semesterService->deleteCoursework($semesterId);
		}
	}
}
