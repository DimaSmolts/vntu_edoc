<?php

namespace App\Controllers;

require_once __DIR__ . '/../../models/ThemeModel.php';
require_once __DIR__ . '/../../services/ThemeService.php';
require_once __DIR__ . '/../../services/LessonTypeService.php';
require_once __DIR__ . '/../../services/LessonThemeService.php';
require_once __DIR__ . '/../../helpers/getLessonTypeId.php';
require_once __DIR__ . '/../../helpers/getFullFormattedThemeData.php';

use App\Services\ThemeService;
use App\Services\LessonTypeService;
use App\Services\LessonThemeService;

class ThemeApiController
{
	protected ThemeService $themeService;
	protected LessonTypeService $lessonTypeService;
	protected LessonThemeService $lessonThemeService;

	function __construct()
	{
		$this->themeService = new ThemeService();
		$this->lessonTypeService = new LessonTypeService();
		$this->lessonThemeService = new LessonThemeService();
	}

	public function getThemesWithLessonThemesByWPId()
	{
		header('Content-Type: application/json');

		$wpId = $_GET['id'];

		$rawThemes = $this->themeService->getThemesWithLessonThemesByWPId($wpId);

		$themes = getFullFormattedThemeData($rawThemes);

		echo json_encode(['status' => 'success', 'themes' => $themes]);
	}

	public function createNewTheme()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$moduleId = intval($data['moduleId']);

		$newThemeId = $this->themeService->createNewTheme($moduleId);

		$lessonTypes = $this->lessonTypeService->getLessonTypes();

		$lectionLessonTypeId = getLessonTypeId($lessonTypes, 'lection');
		$selfworkLessonTypeId = getLessonTypeId($lessonTypes, 'selfwork');

		$this->lessonThemeService->createNewLessonTheme($newThemeId, $lectionLessonTypeId);
		$this->lessonThemeService->createNewLessonTheme($newThemeId, $selfworkLessonTypeId);

		echo json_encode(['status' => 'success', 'themeId' => $newThemeId]);
	}

	public function updateTheme()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$id = intval($data['id']);
		$field = $data['field'];
		$value = $data['value'];

		$this->themeService->updateTheme($id, $field, $value);

		if ($field == 'name') {
			$lessonTypes = $this->lessonTypeService->getLessonTypes();
	
			$lectionLessonTypeId = getLessonTypeId($lessonTypes, 'lection');
			$selfworkLessonTypeId = getLessonTypeId($lessonTypes, 'selfwork');
	
			$this->lessonThemeService->updateLessonTheme($id, $lectionLessonTypeId, $value);
			$this->lessonThemeService->updateLessonTheme($id, $selfworkLessonTypeId, $value);
		}
	}
}
