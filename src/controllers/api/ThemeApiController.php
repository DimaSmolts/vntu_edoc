<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/ThemeService.php';
require_once __DIR__ . '/../../services/LessonTypeService.php';
require_once __DIR__ . '/../../services/LessonService.php';
require_once __DIR__ . '/../../services/EducationalFormCourseworkHoursService.php';
require_once __DIR__ . '/../../models/LessonTypeModel.php';
require_once __DIR__ . '/../../helpers/getLessonTypeId.php';
require_once __DIR__ . '/../../helpers/formatters/getFullFormattedThemeData.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedLessonTypesData.php';
require_once __DIR__ . '/../../helpers/formatters/getFullFormattedCourseworkHoursData.php';

use App\Services\ThemeService;
use App\Services\LessonTypeService;
use App\Services\LessonService;
use App\Services\EducationalFormCourseworkHoursService;

class ThemeApiController
{
	protected ThemeService $themeService;
	protected LessonTypeService $lessonTypeService;
	protected LessonService $lessonService;
	protected EducationalFormCourseworkHoursService $educationalFormCourseworkHoursService;

	function __construct()
	{
		$this->themeService = new ThemeService();
		$this->lessonTypeService = new LessonTypeService();
		$this->lessonService = new LessonService();
		$this->educationalFormCourseworkHoursService = new EducationalFormCourseworkHoursService();
	}

	// Метод контролера для отримання теми з усіма уроками по id робочої програми
	public function getThemesWithLessonsByWPId()
	{
		header('Content-Type: application/json');

		$wpId = $_GET['id'];

		$rawThemes = $this->themeService->getThemesWithLessonsByWPId($wpId);
		$themes = getFullFormattedThemeData($rawThemes);

		echo json_encode(['status' => 'success', 'themes' => $themes], JSON_PRETTY_PRINT);
	}

	// Метод контролера для створення нової теми
	public function createNewTheme()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		// Отримуємо дані з запиту (id модуля, щоб створити тему прив'язаною до модуля)
		$moduleId = intval($data['moduleId']);

		$newThemeId = $this->themeService->createNewTheme($moduleId);

		// Оновлюємо лекції та самостійні (їх кількість збігається з кількістю тем)
		$rawLessonTypes = $this->lessonTypeService->getLessonTypes();
		$lessonTypes = getFormattedLessonTypesData($rawLessonTypes);

		$lectionLessonTypeId = getLessonTypeId($lessonTypes, 'lection');
		$selfworkLessonTypeId = getLessonTypeId($lessonTypes, 'selfwork');

		$this->lessonService->createNewLesson($newThemeId, $lectionLessonTypeId);
		$this->lessonService->createNewLesson($newThemeId, $selfworkLessonTypeId);

		echo json_encode(['status' => 'success', 'themeId' => $newThemeId]);
	}

	// Метод контролера для оновлення тем
	public function updateTheme()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		// Отримуємо дані з запиту
		$id = intval($data['id']);
		$field = $data['field'];
		$value = $data['value'];

		// Оновлюємо власне тему
		$this->themeService->updateTheme($id, $field, $value);

		// Оновлюємо лекції та самостійні (назва та порядковий номер лекцій та самостійних має збігатись з назвою та порядковим номером теми) 
		if ($field == 'name') {
			$rawLessonTypes = $this->lessonTypeService->getLessonTypes();
			$lessonTypes = getFormattedLessonTypesData($rawLessonTypes);

			$lectionLessonTypeId = getLessonTypeId($lessonTypes, 'lection');
			$selfworkLessonTypeId = getLessonTypeId($lessonTypes, 'selfwork');

			$themeId = $id;

			$this->lessonService->updateLesson($themeId, $lectionLessonTypeId, $field, $value);
			$this->lessonService->updateLesson($themeId, $selfworkLessonTypeId, $field, $value);
		}

		if ($field == 'themeNumber') {
			$rawLessonTypes = $this->lessonTypeService->getLessonTypes();
			$lessonTypes = getFormattedLessonTypesData($rawLessonTypes);

			$lectionLessonTypeId = getLessonTypeId($lessonTypes, 'lection');
			$selfworkLessonTypeId = getLessonTypeId($lessonTypes, 'selfwork');

			$themeId = $id;

			$this->lessonService->updateLesson($themeId, $lectionLessonTypeId, 'lessonNumber', $value);
			$this->lessonService->updateLesson($themeId, $selfworkLessonTypeId, 'lessonNumber', $value);
		}
	}

	// Метод контролера для видалення тем
	public function deleteTheme()
	{
		header('Content-Type: application/json');

		$id = $_GET['id'];

		$this->themeService->deleteTheme($id);
	}
}
