<?php

require_once __DIR__ . '/../../models/WPDetailsModel.php';
require_once __DIR__ . '/../../models/SemesterModel.php';
require_once __DIR__ . '/../../models/ModuleModel.php';
require_once __DIR__ . '/../../models/ThemeModel.php';
require_once __DIR__ . '/../../models/WPInvolvedPersonModel.php';

use App\Models\WPDetailsModel;
use App\Models\SemesterModel;
use App\Models\ModuleModel;
use App\Models\ThemeModel;
use App\Models\WPInvolvedPersonModel;

function getFullFormattedWorkingProgramData($workingProgramData)
{
	$workingProgram = new WPDetailsModel(
		$workingProgramData->id,
		$workingProgramData->regularYear,
		$workingProgramData->academicYear,
		$workingProgramData->facultyName,
		$workingProgramData->departmentName,
		$workingProgramData->disciplineName,
		$workingProgramData->degreeName,
		$workingProgramData->fielfOfStudyIdx,
		$workingProgramData->fielfOfStudyName,
		$workingProgramData->specialtyIdx,
		$workingProgramData->specialtyName,
		$workingProgramData->educationalProgram,
		$workingProgramData->notes,
		$workingProgramData->language,
		$workingProgramData->prerequisites,
		$workingProgramData->goal,
		$workingProgramData->tasks,
		$workingProgramData->competences,
		$workingProgramData->programResults,
		$workingProgramData->controlMeasures
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
				$module->name ?? "",
				$module->moduleNumber,
				$themes
			);
		})->toArray();

		return new SemesterModel(
			$semester->id,
			$semester->semesterNumber,
			$semester->examType,
			$modules,
			$semester->courseWork
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

	return $workingProgram;
}