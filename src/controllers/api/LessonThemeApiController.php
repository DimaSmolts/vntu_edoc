<?php

namespace App\Controllers;

require_once __DIR__ . '/../../models/ThemeModel.php';
require_once __DIR__ . '/../../services/ThemeService.php';
require_once __DIR__ . '/../../services/LessonTypeService.php';
require_once __DIR__ . '/../../services/LessonThemeService.php';
require_once __DIR__ . '/../../services/EducationalFormLessonHoursService.php';
require_once __DIR__ . '/../../helpers/getLessonTypeId.php';

use App\Services\LessonTypeService;
use App\Services\LessonThemeService;
use App\Services\EducationalFormLessonHoursService;

class LessonThemeApiController
{
	protected LessonTypeService $lessonTypeService;
	protected LessonThemeService $lessonThemeService;
	protected EducationalFormLessonHoursService $educationalFormLessonHoursService;

	function __construct()
	{
		$this->lessonTypeService = new LessonTypeService();
		$this->lessonThemeService = new LessonThemeService();
		$this->educationalFormLessonHoursService = new EducationalFormLessonHoursService();
	}

	public function createNewLessonTheme()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$themeId = intval($data['themeId']);
		$lessonTypeName = $data['lessonTypeName'];

		$lessonTypes = $this->lessonTypeService->getLessonTypes();

		$lessonTypeId = getLessonTypeId($lessonTypes, $lessonTypeName);

		$newLessonThemeId = $this->lessonThemeService->createNewLessonTheme($themeId, $lessonTypeId);

		$this->educationalFormLessonHoursService->createNewEducationalFormLessonHours($newLessonThemeId, 1);
		//TODOOO!!!!!!!!! cores.

		echo json_encode(['status' => 'success', 'lessonThemeId' => $newLessonThemeId]);
	}

	public function updateLessonTheme()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$id = intval($data['id']);
		$field = $data['field'];
		$value = $data['value'];

		$this->lessonThemeService->updateLessonTheme($id, $field, $value);
	}
}
