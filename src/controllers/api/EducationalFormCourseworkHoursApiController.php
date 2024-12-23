<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/EducationalFormCourseworkHoursService.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\EducationalFormCourseworkHoursService;

class EducationalFormCourseworkHoursApiController extends BaseController
{
	protected WPService $wpService;
	protected EducationalFormCourseworkHoursService $educationalFormCourseworkHoursService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->educationalFormCourseworkHoursService = new EducationalFormCourseworkHoursService();
	}

	public function updateEducationalFormCourseworkHours()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$semesterId = intval($data['semesterId']);
		$educationalFormId = intval($data['educationalFormId']);
		$hours = intval($data['hours']);

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($semesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$this->educationalFormCourseworkHoursService->updateEducationalFormCourseworkHours($semesterId, $educationalFormId, $hours);
		}
	}
}
