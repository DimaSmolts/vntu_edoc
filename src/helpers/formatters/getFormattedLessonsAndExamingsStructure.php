<?php

require_once __DIR__ . '/../../models/LessonsAndExamingsStructureModel.php';
require_once __DIR__ . '/../getIsCourseworkExistsInWP.php';

use App\Models\LessonsAndExamingsStructureModel;

function getFormattedLessonsAndExamingsStructure($data)
{
	$isPracticalsExist = false;
	$isLabsExist = false;
	$isSeminarsExist = false;
	$isCourseworkExists = false;
	$isColloquiumExists = false;

	if (isset($data->semesters)) {

		$isCourseworkExists = getIsCourseworkExistsInWP($data->semesters);

		foreach ($data->semesters as $semester) {
			if (isset($semester->modules)) {
				foreach ($semester->modules as $module) {
					if ($module->isColloquiumExists) {
						$isColloquiumExists = true;
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
		$isColloquiumExists
	);
}
