<?php

require_once __DIR__ . '/../../models/EducationalFormCourseworkHourModel.php';
require_once __DIR__ . '/../../models/SemesterEducationalFormModel.php';
require_once __DIR__ . '/../../models/SemesterCourseworkModel.php';
require_once __DIR__ . '/../getEducationalFormVisualName.php';

use App\Models\EducationalFormCourseworkHourModel;
use App\Models\SemesterEducationalFormModel;
use App\Models\SemesterCourseworkModel;

function getFullFormattedCourseworkData($semesterCourseworkData)
{
	return $semesterCourseworkData->map(function ($semester) {
		$courseworkHours = $semester->educationalFormCourseworkHours->map(function ($data) {
			return new EducationalFormCourseworkHourModel(
				$data->id,
				$data->educationalFormId,
				$data->semesterEducationalForm->educationalForm->name,
				$data->hours
			);
		})->toArray();

		$educationalForms = $semester->educationalForms->map(function ($educationalForm) {
			return new SemesterEducationalFormModel(
				$educationalForm->id,
				$educationalForm->educationalDisciplineSemesterId,
				$educationalForm->educationalFormId,
				$educationalForm->educationalForm->name,
				getEducationalFormVisualName($educationalForm->educationalForm->name)
			);
		})->toArray();

		return new SemesterCourseworkModel(
			$semester->id,
			$semester->isCourseworkExists,
			$semester->semesterNumber,
			$semester->courseworkAssessmentComponents,
			$courseworkHours,
			$educationalForms
		);
	})->toArray();
}
