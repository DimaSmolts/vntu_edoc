<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/ThemeService.php';
require_once __DIR__ . '/../../services/LessonTypeService.php';
require_once __DIR__ . '/../../services/LessonService.php';
require_once __DIR__ . '/../../services/EducationalFormLessonHoursService.php';
require_once __DIR__ . '/../../services/AssessmentCriteriaService.php';
require_once __DIR__ . '/../../models/LessonTypeModel.php';
require_once __DIR__ . '/../../helpers/getLessonTypeId.php';
require_once __DIR__ . '/../../helpers/getLessonTypeIdByName.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedLessonTypesData.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\LessonTypeService;
use App\Services\LessonService;
use App\Services\EducationalFormLessonHoursService;
use App\Services\AssessmentCriteriaService;

class LessonApiController extends BaseController
{
	protected WPService $wpService;
	protected LessonTypeService $lessonTypeService;
	protected LessonService $lessonService;
	protected EducationalFormLessonHoursService $educationalFormLessonHoursService;
	protected AssessmentCriteriaService $assessmentCriteriaService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->lessonTypeService = new LessonTypeService();
		$this->lessonService = new LessonService();
		$this->educationalFormLessonHoursService = new EducationalFormLessonHoursService();
		$this->assessmentCriteriaService = new AssessmentCriteriaService();
	}

	public function createNewLesson()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$semesterId = intval($data['semesterId']);
		$lessonTypeName = $data['lessonTypeName'];

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($semesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$wpId = intval($data['wpId']);

			$rawLessonTypes = $this->lessonTypeService->getLessonTypes();
			$lessonTypes = getFormattedLessonTypesData($rawLessonTypes);

			$lessonTypeId = getLessonTypeId($lessonTypes, $lessonTypeName);

			$newLessonId = $this->lessonService->createNewLesson($semesterId, $lessonTypeId);

			$existingLessonAssessmentCriteria = $this->assessmentCriteriaService->getAssessmentCriteriaByWPIdAndLessonType($wpId, $lessonTypeId);

			if (!$existingLessonAssessmentCriteria) {
				$lessonAssessmentCriteria = $this->assessmentCriteriaService->getAssessmentCriteriaByLessonType($lessonTypeId);

				$this->assessmentCriteriaService->copyAssessmentCriteria($wpId, $lessonAssessmentCriteria);
			}

			echo json_encode(['status' => 'success', 'lessonId' => $newLessonId]);
		}
	}

	public function updateLesson()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$id = intval($data['id']);
		$field = $data['field'];
		$value = $data['value'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByLessonId($id);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$this->lessonService->updateLessonById($id, $field, $value);
		}
	}

	public function deleteLesson()
	{
		header('Content-Type: application/json');

		$wpId = $_GET['wpId'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$id = $_GET['id'];

			$this->lessonService->deleteLesson($id);
		}
	}

	public function deleteAllLessonsByType()
	{
		header('Content-Type: application/json');

		$wpId = $_GET['wpId'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$lessonTypeName = $_GET['lessonTypeName'];
			$semestersIds = isset($_GET['semestersIds']) ? $_GET['semestersIds'] : '';
			$semestersIdsArray = array_map('intval', explode(',', $semestersIds));

			$rawLessonTypes = $this->lessonTypeService->getLessonTypes();
			$lessonTypes = getFormattedLessonTypesData($rawLessonTypes);

			$lessonTypeId = getLessonTypeId($lessonTypes, $lessonTypeName);

			$lessons = $this->lessonService->getLessonsBySemestersIdsAndTypeId($lessonTypeId, $semestersIdsArray);

			$this->assessmentCriteriaService->deleteAssessmentCriteriaByLessonType($wpId, $lessonTypeId);

			if (count($lessons) > 0) {
				$this->lessonService->deleteAllLessonsByType($lessonTypeId, $semestersIdsArray);
			} else {
				echo json_encode(['status' => 'success']);
			}
		}
	}

	public function createNewSelfworkTheme()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$semesterId = intval($data['semesterId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($semesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$lessonTypeIds = getLessonTypeIdByName();

			$newSelfworkId = $this->lessonService->createNewSelfworkTheme($semesterId, $lessonTypeIds->selfwork);

			echo json_encode(['status' => 'success', 'id' => $newSelfworkId]);
		}
	}

	public function updateSelfworkTheme()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$semesterId = intval($data['semesterId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($semesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$field = $data['field'];
			$value = $data['value'];
			$selfworkId = intval($data['selfworkId']);

			$this->lessonService->updateSelfworkTheme($field, $value, $selfworkId);
		}
	}

	public function deleteSelfworkTheme()
	{
		header('Content-Type: application/json');

		$semesterId = $_GET['semesterId'];

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($semesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$id = $_GET['id'];
			$this->lessonService->deleteLesson($id);
		}
	}
}
