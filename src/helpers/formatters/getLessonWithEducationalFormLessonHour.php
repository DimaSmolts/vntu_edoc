<?php

require_once __DIR__ . '/../../models/LessonThemeModel.php';
require_once __DIR__ . '/../../models/EducationalFormLessonHourModel.php';

use App\Models\LessonThemeModel;
use App\Models\EducationalFormLessonHourModel;

function getLessonWithEducationalFormLessonHour($lessons)
{
	return $lessons->map(function ($lessonTheme) {
		$educationalFormHours = $lessonTheme->educationalFormLessonHours->map(function ($lessonHours) {
			return new EducationalFormLessonHourModel(
				$lessonHours->id,
				$lessonHours->educationalFormId,
				$lessonHours->lessonThemeId,
				$lessonHours->semesterEducationalForm->educationalForm->name,
				$lessonHours->hours
			);
		})->toArray();

		return new LessonThemeModel(
			$lessonTheme->id,
			$lessonTheme->lessonTypeId,
			$lessonTheme->name,
			$lessonTheme->lessonThemeNumber,
			$educationalFormHours
		);
	})->toArray();
}
