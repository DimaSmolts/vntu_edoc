<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/EducationalFormLessonHoursService.php';

use App\Services\EducationalFormLessonHoursService;

class EducationalFormLessonHoursApiController
{
	protected EducationalFormLessonHoursService $educationalFormLessonHoursService;

	function __construct()
	{
		$this->educationalFormLessonHoursService = new EducationalFormLessonHoursService();
	}

	public function updateEducationalFormLessonHours()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$lessonThemeId = intval($data['lessonThemeId']);
		$educationalFormId = intval($data['educationalFormId']);
		$hours = intval($data['hours']);

		$this->educationalFormLessonHoursService->updateEducationalFormLessonHours($lessonThemeId, $educationalFormId, $hours);
	}
}
