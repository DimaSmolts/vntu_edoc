<?php

require_once __DIR__ . '/../../models/LessonsAndExamingsStructureModel.php';
require_once __DIR__ . '/../getIsTypeOfWorkExistsInWP.php';
require_once __DIR__ . '/../getIsAdditionalTasksExistInWP.php';

use App\Models\LessonsAndExamingsStructureModel;

function getFormattedLessonsAndExamingsStructure($data)
{
	$isPracticalsExist = false;
	$isLabsExist = false;
	$isSeminarsExist = false;
	$isCourseworkExists = false;
	$isCourseProjectExists = false;
	$isCalculationAndGraphicWorkExists = false;
	$isCalculationAndGraphicTaskExists = false;
	$isAdditionalTasksExist = false;
	$isColloquiumExists = false;
	$isControlWorkExists = false;

	if (isset($data->semesters)) {

		$isCourseworkExists = getIsTypeOfWorkExistsInWP($data->semesters, 'isCourseworkExists');
		$isCourseProjectExists = getIsTypeOfWorkExistsInWP($data->semesters, 'isCourseProjectExists');
		$isCalculationAndGraphicWorkExists = getIsTypeOfWorkExistsInWP($data->semesters, 'isCalculationAndGraphicWorkExists');
		$isCalculationAndGraphicTaskExists = getIsTypeOfWorkExistsInWP($data->semesters, 'isCalculationAndGraphicTaskExists');

		$isAdditionalTasksExist = getIsAdditionalTasksExistInWP($data->semesters);

		foreach ($data->semesters as $semester) {
			if (isset($semester->modules)) {
				foreach ($semester->modules as $module) {
					if ($module->isColloquiumExists) {
						$isColloquiumExists = true;
					}

					if ($module->isControlWorkExists) {
						$isControlWorkExists = true;
					}

					if (isset($module->themes)) {
						foreach ($module->themes as $theme) {
							if (!$theme->practicals->isEmpty()) {
								$isPracticalsExist = true;
							}
							if (!$theme->labs->isEmpty()) {
								$isLabsExist = true;
							}
							if (!$theme->seminars->isEmpty()) {
								$isSeminarsExist = true;
							}
						}
					}
				}
			}
		}
	}

	return new LessonsAndExamingsStructureModel(
		$isPracticalsExist,
		$isLabsExist,
		$isSeminarsExist,
		$isCourseworkExists,
		$isCourseProjectExists,
		$isCalculationAndGraphicWorkExists,
		$isCalculationAndGraphicTaskExists,
		$isAdditionalTasksExist,
		$isColloquiumExists,
		$isControlWorkExists,
	);
}
