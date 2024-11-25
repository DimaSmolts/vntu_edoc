<?php

require_once __DIR__ . '/../../models/ThemeWithLessonsModel.php';
require_once __DIR__ . '/../../models/LessonThemeModel.php';
require_once __DIR__ . '/../../models/EducationalFormLessonHourModel.php';
require_once __DIR__ . '/../../models/SemesterEducationalFormModel.php';

use App\Models\ThemeWithLessonsModel;
use App\Models\LessonThemeModel;
use App\Models\EducationalFormLessonHourModel;
use App\Models\SemesterEducationalFormModel;

function getFullFormattedThemeData($themes)
{
	return $themes->map(function ($theme) {
		$educationalForms = $theme->module->semester->educationalForms->map(function ($educationalForm) {
			return new SemesterEducationalFormModel(
				$educationalForm->id,
				$educationalForm->educationalDisciplineSemesterId,
				$educationalForm->educationalFormId,
				$educationalForm->educationalForm->name,
				getEducationalFormVisualName($educationalForm->educationalForm->name)
			);
		})->toArray();

		return new ThemeWithLessonsModel(
			$theme->id,
			$theme->name,
			$theme->description,
			$theme->themeNumber,
			$theme->lections->map(function ($lessonTheme) {
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
			})->toArray(),
			$theme->practicals->map(function ($lessonTheme) {
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
			})->toArray(),
			$theme->seminars->map(function ($lessonTheme) {
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
			})->toArray(),
			$theme->labs->map(function ($lessonTheme) {
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
			})->toArray(),
			$theme->selfworks->map(function ($lessonTheme) {
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
			})->toArray(),
			$educationalForms
		);
	})->toArray();
}
