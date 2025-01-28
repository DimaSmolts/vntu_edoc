<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/ThemeService.php';
require_once __DIR__ . '/../../services/LessonTypeService.php';
require_once __DIR__ . '/../../services/LessonService.php';
require_once __DIR__ . '/../../models/LessonTypeModel.php';
require_once __DIR__ . '/../../helpers/getLessonTypeId.php';
require_once __DIR__ . '/../../helpers/formatters/getFullFormattedThemeData.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedLessonTypesData.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\ThemeService;
use App\Services\LessonTypeService;
use App\Services\LessonService;

class ThemeApiController extends BaseController
{
	protected WPService $wpService;
	protected ThemeService $themeService;
	protected LessonTypeService $lessonTypeService;
	protected LessonService $lessonService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->themeService = new ThemeService();
		$this->lessonTypeService = new LessonTypeService();
		$this->lessonService = new LessonService();
	}

	// Метод контролера для створення нової теми
	public function createNewTheme()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		// Отримуємо дані з запиту (id модуля, щоб створити тему прив'язаною до модуля)
		$moduleId = intval($data['moduleId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdByModuleId($moduleId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$newThemeId = $this->themeService->createNewTheme($moduleId);

			// Оновлюємо лекції та самостійні (їх кількість збігається з кількістю тем)
			$rawLessonTypes = $this->lessonTypeService->getLessonTypes();
			$lessonTypes = getFormattedLessonTypesData($rawLessonTypes);

			$lectionLessonTypeId = getLessonTypeId($lessonTypes, 'lection');

			$this->lessonService->createNewLessonWithThemeId($newThemeId, $lectionLessonTypeId);

			echo json_encode(['status' => 'success', 'themeId' => $newThemeId]);
		}
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

		$wpCreatorId = $this->wpService->getWPCreatorIdByThemeId($id);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			// Оновлюємо власне тему
			$this->themeService->updateTheme($id, $field, $value);

			// Оновлюємо лекції (назва та порядковий номер лекцій та самостійних має збігатись з назвою та порядковим номером теми) 
			if ($field == 'name') {
				$rawLessonTypes = $this->lessonTypeService->getLessonTypes();
				$lessonTypes = getFormattedLessonTypesData($rawLessonTypes);

				$lectionLessonTypeId = getLessonTypeId($lessonTypes, 'lection');

				$themeId = $id;

				$this->lessonService->updateLesson($themeId, $lectionLessonTypeId, $field, $value);
			}

			if ($field == 'themeNumber') {
				$rawLessonTypes = $this->lessonTypeService->getLessonTypes();
				$lessonTypes = getFormattedLessonTypesData($rawLessonTypes);

				$lectionLessonTypeId = getLessonTypeId($lessonTypes, 'lection');

				$themeId = $id;

				$this->lessonService->updateLesson($themeId, $lectionLessonTypeId, 'lessonNumber', $value);
			}
		}
	}

	// Метод контролера для видалення тем
	public function deleteTheme()
	{
		header('Content-Type: application/json');

		$id = $_GET['id'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByThemeId($id);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$this->themeService->deleteTheme($id);
		}
	}
}
