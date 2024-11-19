<?php

require_once __DIR__ . '/../../models/ThemeWithLessonsModel.php';
require_once __DIR__ . '/../../models/LessonThemeModel.php';

use App\Models\ThemeWithLessonsModel;
use App\Models\LessonThemeModel;

function getFullFormattedThemeData($themes)
{
	return $themes->map(function ($theme) {
		return new ThemeWithLessonsModel(
			$theme->id,
			$theme->name,
			$theme->themeNumber,
			$theme->lections->map(function ($lessonTheme) {
				return new LessonThemeModel(
					$lessonTheme->id,
					$lessonTheme->lessonTypeId,
					$lessonTheme->name,
					$lessonTheme->lessonThemeNumber,
					$lessonTheme->educationFormLessonHoursFulltime->first()->hours ?? 0,
					$lessonTheme->educationFormLessonHoursCorrespondence->first()->hours ?? 0
				);
			})->toArray(),
			$theme->practicals->map(function ($lessonTheme) {
				return new LessonThemeModel(
					$lessonTheme->id,
					$lessonTheme->lessonTypeId,
					$lessonTheme->name,
					$lessonTheme->lessonThemeNumber,
					$lessonTheme->educationFormLessonHoursFulltime->first()->hours ?? 0,
					$lessonTheme->educationFormLessonHoursCorrespondence->first()->hours ?? 0
				);
			})->toArray(),
			$theme->seminars->map(function ($lessonTheme) {
				return new LessonThemeModel(
					$lessonTheme->id,
					$lessonTheme->lessonTypeId,
					$lessonTheme->name,
					$lessonTheme->lessonThemeNumber,
					$lessonTheme->educationFormLessonHoursFulltime->first()->hours ?? 0,
					$lessonTheme->educationFormLessonHoursCorrespondence->first()->hours ?? 0
				);
			})->toArray(),
			$theme->labs->map(function ($lessonTheme) {
				return new LessonThemeModel(
					$lessonTheme->id,
					$lessonTheme->lessonTypeId,
					$lessonTheme->name,
					$lessonTheme->lessonThemeNumber,
					$lessonTheme->educationFormLessonHoursFulltime->first()->hours ?? 0,
					$lessonTheme->educationFormLessonHoursCorrespondence->first()->hours ?? 0
				);
			})->toArray(),
			$theme->selfworks->map(function ($lessonTheme) {
				return new LessonThemeModel(
					$lessonTheme->id,
					$lessonTheme->lessonTypeId,
					$lessonTheme->name,
					$lessonTheme->lessonThemeNumber,
					$lessonTheme->educationFormLessonHoursFulltime->first()->hours ?? 0,
					$lessonTheme->educationFormLessonHoursCorrespondence->first()->hours ?? 0
				);
			})->toArray()
		);
	});
}
