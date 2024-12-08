<?php

require_once __DIR__ . '/../../models/WPDetailsModel.php';
require_once __DIR__ . '/../../models/SemesterModel.php';
require_once __DIR__ . '/../../models/ModuleModel.php';
require_once __DIR__ . '/../../models/ThemeModel.php';
require_once __DIR__ . '/../../models/WPInvolvedPersonModel.php';
require_once __DIR__ . '/../../models/SemesterEducationalFormModel.php';
require_once __DIR__ . '/../../models/WorkingProgramLiteratureModel.php';
require_once __DIR__ . '/../../models/EducationalFormCourseworkHourModel.php';
require_once __DIR__ . '/../../helpers/getEducationalFormVisualName.php';
require_once __DIR__ . '/../getEducationalFormVisualName.php';
require_once __DIR__ . '/getFullFormattedWorkingProgramGlobalData.php';

use App\Models\WPDetailsModel;
use App\Models\SemesterModel;
use App\Models\ModuleModel;
use App\Models\ThemeModel;
use App\Models\WPInvolvedPersonModel;
use App\Models\SemesterEducationalFormModel;
use App\Models\WorkingProgramLiteratureModel;
use App\Models\EducationalFormCourseworkHourModel;

function getFullFormattedWorkingProgramData($workingProgramData)
{
	$workingProgram = new WPDetailsModel(
		$workingProgramData->id,
		$workingProgramData->regularYear,
		$workingProgramData->academicYear,
		$workingProgramData->facultyId,
		$workingProgramData->departmentId,
		$workingProgramData->disciplineName ?? '',
		$workingProgramData->degreeName ?? '',
		$workingProgramData->fielfOfStudyIdx ?? '',
		$workingProgramData->fielfOfStudyName ?? '',
		$workingProgramData->specialtyIdx ?? '',
		$workingProgramData->specialtyName ?? '',
		$workingProgramData->educationalProgram ?? '',
		$workingProgramData->notes ?? '',
		$workingProgramData->prerequisites ?? '',
		$workingProgramData->goal ?? '',
		$workingProgramData->tasks ?? '',
		$workingProgramData->competences ?? '',
		$workingProgramData->programResults ?? '',
		$workingProgramData->controlMeasures ?? '',
		$workingProgramData->studingMethods ?? '',
		$workingProgramData->examingMethods ?? '',
		$workingProgramData->code ?? '',
		$workingProgramData->methodologicalSupport ?? '',
		$workingProgramData->individualTaskNotes ?? '',
		$workingProgramData->creditsAmount,
	);

	$formattedSemesters = $workingProgramData->semesters->map(function ($semester) {
		$modules = $semester->modules->map(function ($module) {
			$themes = $module->themes->map(function ($theme) {
				return new ThemeModel(
					$theme->id,
					$theme->name ?? "",
					$theme->description ?? "",
					$theme->themeNumber
				);
			})->toArray();

			return new ModuleModel(
				$module->id,
				$module->isColloquiumExists,
				$module->name ?? "",
				$module->moduleNumber,
				$module->colloquiumPoints,
				$themes
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

		$courseworkHours = $semester->educationalFormCourseworkHours->map(function ($hours) {
			return new EducationalFormCourseworkHourModel(
				$hours->id,
				$hours->educationalFormId,
				$hours->semesterEducationalForm->educationalForm->name,
				$hours->hours
			);
		})->toArray();

		return new SemesterModel(
			$semester->id,
			$semester->isCourseworkExists,
			$semester->semesterNumber,
			$semester->examType,
			$modules,
			$educationalForms,
			$courseworkHours
		);
	})->toArray();

	$workingProgram->semesters = $formattedSemesters;

	$formattedCreatedByPersons = $workingProgramData->createdByPersons->map(function ($involvedPerson) {
		return new WPInvolvedPersonModel(
			$involvedPerson->id,
			$involvedPerson->personId,
			$involvedPerson->involvedPersonRoleId,
			$involvedPerson->person->surname,
			$involvedPerson->person->name,
			$involvedPerson->person->patronymicName,
			$involvedPerson->person->degree,
			$involvedPerson->involvedRole->role
		);
	})->toArray();

	$workingProgram->createdByPersons = $formattedCreatedByPersons;

	$workingProgram->globalData = getFullFormattedWorkingProgramGlobalData($workingProgramData->globalData);

	$formattedLiterature = isset($workingProgramData->literature) ? new WorkingProgramLiteratureModel(
		$workingProgramData->literature->main,
		$workingProgramData->literature->supporting,
		$workingProgramData->literature->additional,
		$workingProgramData->literature->informationResources
	) : null;

	$workingProgram->literature = $formattedLiterature;

	return $workingProgram;
}
