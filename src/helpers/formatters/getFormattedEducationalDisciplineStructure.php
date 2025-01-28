<?php

require_once __DIR__ . '/../../models/SemesterEducationalDisciplineStructureModel.php';
require_once __DIR__ . '/../../models/EducationalFormModel.php';
require_once __DIR__ . '/../../models/ModuleEducationalDisciplineStructureModel.php';
require_once __DIR__ . '/getFormattedEducationalFormData.php';
require_once __DIR__ . '/getLessonWithEducationalFormLessonHour.php';
require_once __DIR__ . '/../getEducationalFormVisualName.php';

use App\Models\SemesterEducationalDisciplineStructureModel;
use App\Models\EducationalFormModel;
use App\Models\ModuleEducationalDisciplineStructureModel;

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
			$modules = [];

			if (!empty($semester->modules)) {
				foreach ($semester->modules as $module) {
					if (!empty($module->themes)) {
						$module->themes->map(function ($theme) use (&$lections) {
							$themeLections = getLessonWithEducationalFormLessonHour($theme->lections);
							$lections = array_values(array_merge($lections, $themeLections));
						});
					}

					$seminars = getLessonWithEducationalFormLessonHour($module->seminars);
					$practicals = getLessonWithEducationalFormLessonHour($module->practicals);
					$labs = getLessonWithEducationalFormLessonHour($module->labs);

					$modules[] = new ModuleEducationalDisciplineStructureModel(
						$module->id,
						$module->moduleNumber,
						$seminars,
						$practicals,
						$labs
					);
				}
			}

			$educationalDisciplineStructure[] = new SemesterEducationalDisciplineStructureModel(
				$semester->id,
				$semester->semesterNumber,
				$educationalForms,
				$lections,
				$modules
			);
		}
	}

	return $educationalDisciplineStructure;
}
