<?php

require_once __DIR__ . '/../../models/ThemeWithLessonsModel.php';
require_once __DIR__ . '/../../models/LessonModel.php';
require_once __DIR__ . '/../../models/EducationalFormLessonHourModel.php';
require_once __DIR__ . '/../../models/SemesterEducationalFormModel.php';

use App\Models\ThemeWithLessonsModel;
use App\Models\LessonModel;
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
			$theme->lections->map(function ($lesson) {
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
			})->toArray(),
			$theme->practicals->map(function ($lesson) {
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
			})->toArray(),
			$theme->seminars->map(function ($lesson) {
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
			})->toArray(),
			$theme->labs->map(function ($lesson) {
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
			})->toArray(),
			$educationalForms
		);
	})->toArray();
}
