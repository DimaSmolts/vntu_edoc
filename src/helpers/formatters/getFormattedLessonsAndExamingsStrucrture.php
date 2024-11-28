<?php

require_once __DIR__ . '/../../models/LessonsAndExamingsStructureModel.php';

use App\Models\LessonsAndExamingsStructureModel;

function getFormattedLessonsAndExamingsStrucrture($data)
{
	$isPracticalsExist = false;
	$isLabsExist = false;
	$isSeminarsExist = false;

	if (isset($data->semesters)) {
		foreach ($data->semesters as $semester) {
			if (isset($semester->modules)) {
				foreach ($semester->modules as $module) {
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
		$isCourseworkExists ?? false,
		$isColloquiumExists ?? false
	);
}
