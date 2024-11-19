<?php

namespace App\Services;

require_once __DIR__ . '/../models/DBEducationFormLessonHoursModel.php';

use Illuminate\Database\Capsule\Manager as Capsule;

class EducationalFormLessonHoursService
{
	public function createNewEducationalFormLessonHours($lessonThemeId, $educationalFormId): int
	{
		$educationFormLessonHoursId = Capsule::table('educationFormLessonHours')->insertGetId([
			'lessonThemeId' => $lessonThemeId,
			'educationalFormId' => $educationalFormId
		]);

		return $educationFormLessonHoursId;
	}

	public function updateEducationalFormLessonHours($lessonThemeId, $educationalFormId, $hours)
	{
		$educationFormLessonHours = Capsule::table('educationFormLessonHours')
			->where('educationalFormId', $educationalFormId)
			->where('lessonThemeId', $lessonThemeId)
			->first();

		if (!$educationFormLessonHours) {
			echo json_encode(['status' => 'error', 'message' => 'EducationFormLessonHours not found']);
			return;
		}

		$updated = Capsule::table('educationFormLessonHours')
			->where('educationalFormId', $educationalFormId)
			->where('lessonThemeId', $lessonThemeId)
			->update(['hours' => $hours]);

		if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'EducationFormLessonHours updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}
}
