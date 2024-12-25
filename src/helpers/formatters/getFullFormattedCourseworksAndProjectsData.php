<?php

require_once __DIR__ . '/../../models/SemesterEducationalFormModel.php';
require_once __DIR__ . '/../../models/SemesterCourseworkAndProjectModel.php';
require_once __DIR__ . '/../getEducationalFormVisualName.php';

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

		return new SemesterCourseworkAndProjectModel(
			$semester->id,
			$semester->isCourseworkExists,
			$semester->isCourseProjectExists,
			$semester->semesterNumber,
			$semester->courseworkAssessmentComponents,
			$semester->courseProjectAssessmentComponents,
			$educationalForms
		);
	})->toArray();
}
