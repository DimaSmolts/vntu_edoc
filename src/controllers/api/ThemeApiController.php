<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/ThemeService.php';
require_once __DIR__ . '/../../services/LessonTypeService.php';
require_once __DIR__ . '/../../services/LessonThemeService.php';
require_once __DIR__ . '/../../models/LessonTypeModel.php';
require_once __DIR__ . '/../../helpers/getLessonTypeId.php';
require_once __DIR__ . '/../../helpers/formatters/getFullFormattedThemeData.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedLessonTypesData.php';

use App\Services\ThemeService;
use App\Services\LessonTypeService;
use App\Services\LessonThemeService;
use App\Models\LessonTypeModel;

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

		echo json_encode(['status' => 'success', 'themes' => $themes], JSON_PRETTY_PRINT);
	}

	public function createNewTheme()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$moduleId = intval($data['moduleId']);

		$newThemeId = $this->themeService->createNewTheme($moduleId);

		$rawLessonTypes = $this->lessonTypeService->getLessonTypes();
		$lessonTypes = getFormattedLessonTypesData($rawLessonTypes);

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
			$rawLessonTypes = $this->lessonTypeService->getLessonTypes();

			$lessonTypes = [];

			foreach ($rawLessonTypes as $rawLessonType) {
				$lessonTypes[] = new LessonTypeModel(
					$rawLessonType['id'],
					$rawLessonType['name']
				);
			}

			$lectionLessonTypeId = getLessonTypeId($lessonTypes, 'lection');
			$selfworkLessonTypeId = getLessonTypeId($lessonTypes, 'selfwork');

			$this->lessonThemeService->updateLessonTheme($id, $lectionLessonTypeId, $value);
			$this->lessonThemeService->updateLessonTheme($id, $selfworkLessonTypeId, $value);
		}
	}

	public function deleteTheme()
	{
		header('Content-Type: application/json');

		$id = $_GET['id'];

		$this->themeService->deleteTheme($id);
	}
}
