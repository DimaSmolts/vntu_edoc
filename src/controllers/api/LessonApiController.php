<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/ThemeService.php';
require_once __DIR__ . '/../../services/LessonTypeService.php';
require_once __DIR__ . '/../../services/LessonService.php';
require_once __DIR__ . '/../../services/EducationalFormLessonHoursService.php';
require_once __DIR__ . '/../../models/LessonTypeModel.php';
require_once __DIR__ . '/../../helpers/getLessonTypeId.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedLessonTypesData.php';

use App\Services\LessonTypeService;
use App\Services\LessonService;
use App\Services\EducationalFormLessonHoursService;

class LessonApiController
{
	protected LessonTypeService $lessonTypeService;
	protected LessonService $lessonService;
	protected EducationalFormLessonHoursService $educationalFormLessonHoursService;

	function __construct()
	{
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

		$rawLessonTypes = $this->lessonTypeService->getLessonTypes();
		$lessonTypes = getFormattedLessonTypesData($rawLessonTypes);

		$lessonTypeId = getLessonTypeId($lessonTypes, $lessonTypeName);

		$newLessonId = $this->lessonService->createNewLesson($themeId, $lessonTypeId);

		echo json_encode(['status' => 'success', 'lessonId' => $newLessonId]);
	}

	public function updateLesson()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$id = intval($data['id']);
		$field = $data['field'];
		$value = $data['value'];

		$this->lessonService->updateLessonById($id, $field, $value);
	}

	public function deleteLesson()
	{
		header('Content-Type: application/json');

		$id = $_GET['id'];

		$this->lessonService->deleteLesson($id);
	}
}
