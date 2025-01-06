<?php

require_once __DIR__ . '/../../models/SemesterEducationalFormModel.php';
require_once __DIR__ . '/../../models/SemesterCourseworkAndProjectModel.php';
require_once __DIR__ . '/../getEducationalFormVisualName.php';
require_once __DIR__ . '/../getIsTypeOfWorkExists.php';
require_once __DIR__ . '/../getCourseTask.php';

use App\Models\SemesterEducationalFormModel;
use App\Models\SemesterCourseworkAndProjectModel;

function getFullFormattedCourseworksAndProjectsData($semesterCourseworkData)
{
	return $semesterCourseworkData->map(function ($semester) {
		$educationalForms = $semester->educationalForms->map(function ($educationalForm) {
			return new SemesterEducationalFormModel(
				$educationalForm->id,
				$educationalForm->educationalDisciplineSemesterId,
				$educationalForm->educationalFormId,
				$educationalForm->educationalForm->name,
				getEducationalFormVisualName($educationalForm->educationalForm->name)
			);
		})->toArray();

		$courseTask = getCourseTask($semester);

		return new SemesterCourseworkAndProjectModel(
			$semester->id,
			isset($courseTask),
			$semester->semesterNumber,
			isset($courseTask) ? $courseTask->taskType->id : null,
			isset($courseTask) ? $courseTask->taskType->name : '',
			isset($courseTask) ? $courseTask->assessmentComponents : '',
			isset($courseTask->educationalFormTaskHours[0]) ? $courseTask->educationalFormTaskHours[0]->hours : null,
			$educationalForms
		);
	})->toArray();
}
