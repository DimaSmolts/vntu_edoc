<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/EducationalFormCourseworkHoursService.php';

use App\Services\EducationalFormCourseworkHoursService;

class EducationalFormCourseworkHoursApiController
{
	protected EducationalFormCourseworkHoursService $educationalFormCourseworkHoursService;

	function __construct()
	{
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

		$this->educationalFormCourseworkHoursService->updateEducationalFormCourseworkHours($semesterId, $educationalFormId, $hours);
	}
}
