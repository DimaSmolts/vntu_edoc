<?php

require_once __DIR__ . '/../../models/LessonModel.php';
require_once __DIR__ . '/../../models/EducationalFormLessonHourModel.php';

use App\Models\LessonModel;
use App\Models\EducationalFormLessonHourModel;

function getLessonWithEducationalFormLessonHour($lessons)
{
	return $lessons->map(function ($lesson) {
		$educationalFormHours = $lesson->educationalFormLessonHours->map(function ($lessonHours) {
			return new EducationalFormLessonHourModel(
				$lessonHours->id,
				$lessonHours->educationalFormId,
				$lessonHours->lessonId,
				$lessonHours->semesterEducationalForm->educationalForm->name,
				$lessonHours->hours
			);
		})->toArray();

		return new LessonModel(
			$lesson->id,
			$lesson->lessonTypeId,
			$lesson->name,
			$lesson->lessonNumber,
			$educationalFormHours
		);
	})->toArray();
}
