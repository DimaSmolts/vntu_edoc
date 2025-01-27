<?php

require_once __DIR__ . '/../../models/LessonsAndExamingsStructureModel.php';
require_once __DIR__ . '/../getIsAdditionalTasksExistInWP.php';
require_once __DIR__ . '/../getTaskId.php';
require_once __DIR__ . '/../getIsTypeOfWorkExists.php';

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

	$tasksIds = getTaskId();

	$isCourseworkExists = getIsTypeOfWorkExistsInWP($data->semesters, $tasksIds->coursework);
	$isCourseProjectExists = getIsTypeOfWorkExistsInWP($data->semesters,  $tasksIds->courseProject);

	$isAdditionalTasksExist = getIsAdditionalTasksExistInWP($data->semesters);

	if (isset($data->semesters)) {
		foreach ($data->semesters as $semester) {
			if (getIsTypeOfWorkExistsInSemester($semester, $tasksIds->calculationAndGraphicWork)) {
				$isCalculationAndGraphicWorkExists = true;
			};

			if (getIsTypeOfWorkExistsInSemester($semester, $tasksIds->calculationAndGraphicTask)) {
				$isCalculationAndGraphicTaskExists = true;
			};

			if (isset($semester->modules)) {
				foreach ($semester->modules as $module) {
					if (getIsTypeOfWorkExistsInModule($module, $tasksIds->colloquium)) {
						$isColloquiumExists = true;
					};

					if (getIsTypeOfWorkExistsInModule($module, $tasksIds->controlWork)) {
						$isControlWorkExists = true;
					}
				}
			}

			if (!$semester->practicals->isEmpty()) {
				$isPracticalsExist = true;
			}
			if (!$semester->labs->isEmpty()) {
				$isLabsExist = true;
			}
			if (!$semester->seminars->isEmpty()) {
				$isSeminarsExist = true;
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
