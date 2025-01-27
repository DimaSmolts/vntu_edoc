<?php

require_once __DIR__ . '/../../models/SemesterEducationalDisciplineStructureModel.php';
require_once __DIR__ . '/../../models/EducationalFormModel.php';
require_once __DIR__ . '/getFormattedEducationalFormData.php';
require_once __DIR__ . '/getLessonWithEducationalFormLessonHour.php';
require_once __DIR__ . '/../getEducationalFormVisualName.php';

use App\Models\SemesterEducationalDisciplineStructureModel;
use App\Models\EducationalFormModel;

function getFormattedEducationalDisciplineStructure($wp)
{
	$educationalDisciplineStructure = [];

	if (!empty($wp->semesters)) {
		foreach ($wp->semesters as $semester) {
			$educationalForms = !empty($semester->educationalForms) ? $semester->educationalForms->map(function ($educationalFormsObject) {

				return new EducationalFormModel(
					$educationalFormsObject->id,
					$educationalFormsObject->educationalForm->name,
					getEducationalFormVisualName($educationalFormsObject->educationalForm->name)
				);
			})->toArray() : [];

			$lections = [];
			$seminars = [];
			$practicals = [];
			$labs = [];

			if (!empty($semester->modules)) {
				foreach ($semester->modules as $module) {
					if (!empty($module->themes)) {
						$module->themes->map(function ($theme) use (&$lections) {
							$themeLections = getLessonWithEducationalFormLessonHour($theme->lections);
							$lections = array_values(array_merge($lections, $themeLections));
						});
					}
				}
			}

			$themeSeminars = getLessonWithEducationalFormLessonHour($semester->seminars);
			$seminars = array_values(array_merge($seminars, $themeSeminars));

			$themePracticals = getLessonWithEducationalFormLessonHour($semester->practicals);
			$practicals = array_values(array_merge($practicals, $themePracticals));

			$themeLabs = getLessonWithEducationalFormLessonHour($semester->labs);
			$labs = array_values(array_merge($labs, $themeLabs));

			$educationalDisciplineStructure[] = new SemesterEducationalDisciplineStructureModel(
				$semester->id,
				$semester->semesterNumber,
				$educationalForms,
				$lections,
				$seminars,
				$practicals,
				$labs
			);
		}
	}

	return $educationalDisciplineStructure;
}
