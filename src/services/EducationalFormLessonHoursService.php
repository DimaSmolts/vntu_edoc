<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class EducationalFormLessonHoursService
{
	public function updateEducationalFormLessonHours($lessonId, $educationalFormId, $hours)
	{
		Capsule::table('educationalFormLessonHours')
			->updateOrInsert(
				[
					'educationalFormId' => $educationalFormId,
					'lessonId' => $lessonId
				],
				[
					'hours' => $hours
				]
			);
	}

	public function updateSelfworkHours($selfworkId, $educationalFormId, $hours)
	{
		Capsule::table('educationalFormLessonHours')
			->updateOrInsert(
				[
					'educationalFormId' => $educationalFormId,
					'lessonId' => $selfworkId
				],
				[
					'hours' => $hours
				]
			);
	}
}
