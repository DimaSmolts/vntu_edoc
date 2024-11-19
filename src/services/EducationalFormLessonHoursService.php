<?php

namespace App\Services;

require_once __DIR__ . '/../models/DBEducationalFormLessonHoursModel.php';

use Illuminate\Database\Capsule\Manager as Capsule;

class EducationalFormLessonHoursService
{
	public function createNewEducationalFormLessonHours($lessonThemeId, $educationalFormId): int
	{
		$educationalFormLessonHoursId = Capsule::table('educationalFormLessonHours')->insertGetId([
			'lessonThemeId' => $lessonThemeId,
			'educationalFormId' => $educationalFormId
		]);

		return $educationalFormLessonHoursId;
	}

	public function updateEducationalFormLessonHours($lessonThemeId, $educationalFormId, $hours)
	{
		Capsule::table('educationalFormLessonHours')->updateOrInsert(
			[
				'educationalFormId' => $educationalFormId,
				'lessonThemeId' => $lessonThemeId
			],
			[
				'hours' => $hours
			]
		);
	}
}
