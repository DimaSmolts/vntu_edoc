<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/ThemeService.php';
require_once __DIR__ . '/../../services/LessonTypeService.php';
require_once __DIR__ . '/../../services/LessonService.php';
require_once __DIR__ . '/../../services/EducationalFormLessonHoursService.php';
require_once __DIR__ . '/../../models/LessonTypeModel.php';
require_once __DIR__ . '/../../helpers/getLessonTypeId.php';
require_once __DIR__ . '/../../helpers/getLessonTypeIdByName.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedLessonTypesData.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\LessonTypeService;
use App\Services\LessonService;
use App\Services\EducationalFormLessonHoursService;

class LessonApiController extends BaseController
{
	protected WPService $wpService;
	protected LessonTypeService $lessonTypeService;
	protected LessonService $lessonService;
	protected EducationalFormLessonHoursService $educationalFormLessonHoursService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->lessonTypeService = new LessonTypeService();
		$this->lessonService = new LessonService();
		$this->educationalFormLessonHoursService = new EducationalFormLessonHoursService();
	}

	public function createNewLesson()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$themeId = intval($data['themeId']);
		$lessonTypeName = $data['lessonTypeName'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByThemeId($themeId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$rawLessonTypes = $this->lessonTypeService->getLessonTypes();
			$lessonTypes = getFormattedLessonTypesData($rawLessonTypes);

			$lessonTypeId = getLessonTypeId($lessonTypes, $lessonTypeName);

			$newLessonId = $this->lessonService->createNewLesson($themeId, $lessonTypeId);

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

		$id = $_GET['id'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByLessonId($id);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$this->lessonService->deleteLesson($id);
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
