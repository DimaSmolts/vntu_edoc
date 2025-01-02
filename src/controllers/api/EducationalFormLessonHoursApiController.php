<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/EducationalFormLessonHoursService.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\EducationalFormLessonHoursService;

class EducationalFormLessonHoursApiController extends BaseController
{
	protected WPService $wpService;
	protected EducationalFormLessonHoursService $educationalFormLessonHoursService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->educationalFormLessonHoursService = new EducationalFormLessonHoursService();
	}

	public function updateEducationalFormLessonHours()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$lessonId = intval($data['lessonId']);
		$educationalFormId = intval($data['educationalFormId']);
		$hours = intval($data['hours']);

		$wpCreatorId = $this->wpService->getWPCreatorIdByLessonId($lessonId);
		$ifCurrentUserHasAccessToWP  = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$this->educationalFormLessonHoursService->updateEducationalFormLessonHours($lessonId, $educationalFormId, $hours);
		}
	}

	public function updateSelfworkHours()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$semesterId = intval($data['semesterId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($semesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$hours = intval($data['hours']);
			$educationalFormId = intval($data['educationalFormId']);
			$selfworkId = intval($data['selfworkId']);

			$this->educationalFormLessonHoursService->updateSelfworkHours($selfworkId, $educationalFormId, $hours);
		}
	}
}
