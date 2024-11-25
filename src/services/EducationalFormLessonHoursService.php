<?php

namespace App\Services;

require_once __DIR__ . '/../models/DBEducationalFormLessonHoursModel.php';

use Illuminate\Database\Capsule\Manager as Capsule;

class EducationalFormLessonHoursService
{
	public function createNewEducationalFormLessonHours($lessonId, $educationalFormId): int
	{
		$educationalFormLessonHoursId = Capsule::table('educationalFormLessonHours')->insertGetId([
			'lessonId' => $lessonId,
			'educationalFormId' => $educationalFormId
		]);

		return $educationalFormLessonHoursId;
	}

	public function updateEducationalFormLessonHours($lessonId, $educationalFormId, $hours)
	{
		Capsule::table('educationalFormLessonHours')->updateOrInsert(
			[
				'educationalFormId' => $educationalFormId,
				'lessonId' => $lessonId
			],
			[
				'hours' => $hours
			]
		);
	}
}
