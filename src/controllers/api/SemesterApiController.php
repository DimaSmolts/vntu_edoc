<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/SemesterService.php';
require_once __DIR__ . '/../../helpers/formatters/getFullFormattedCourseworkData.php';
require_once __DIR__ . '/../../helpers/getIsCourseworkExistsInWP.php';

use App\Services\SemesterService;

class SemesterApiController
{
	protected SemesterService $semesterService;

	function __construct()
	{
		$this->semesterService = new SemesterService();
	}

	public function createNewSemester()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$wpId = intval($data['wpId']);

		$newSemesterId = $this->semesterService->createNewSemester($wpId);

		echo json_encode(['status' => 'success', 'semesterId' => $newSemesterId]);
	}

	public function updateSemester()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$id = intval($data['id']);
		$field = $data['field'];
		$value = $data['value'];

		$this->semesterService->updateSemester($id, $field, $value);
	}

	public function deleteSemester()
	{
		header('Content-Type: application/json');

		$id = $_GET['id'];

		$this->semesterService->deleteSemester($id);
	}

	public function getCoursework()
	{
		header('Content-Type: application/json');

		$wpId = $_GET['id'];

		$rawSemestersCourseworkInfo = $this->semesterService->getCourseworkHoursByWPId($wpId);
		$semesters = getFullFormattedCourseworkData($rawSemestersCourseworkInfo);
		$isCourseworkExists = getIsCourseworkExistsInWP($semesters);

		if ($isCourseworkExists) {
			$showReturnBtn = true;
			$isAbleToEditGlobalData = false;

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

	public function updateCourseworkAssesmentComponents()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$id = intval($data['semesterId']);
		$courseworkAssessmentComponents = json_encode($data['courseworkAssessmentComponents']);

		$this->semesterService->updateCourseworkAssesmentComponents($id, $courseworkAssessmentComponents);
	}

	public function deleteCoursework()
	{
		header('Content-Type: application/json');

		$semesterId = $_GET['semesterId'];

		$this->semesterService->deleteCoursework($semesterId);
	}
}
