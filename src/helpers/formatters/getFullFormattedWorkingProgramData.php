<?php

require_once __DIR__ . '/../../models/WPDetailsModel.php';
require_once __DIR__ . '/../../models/SemesterModel.php';
require_once __DIR__ . '/../../models/ModuleModel.php';
require_once __DIR__ . '/../../models/ThemeModel.php';
require_once __DIR__ . '/../../models/WPInvolvedPersonModel.php';
require_once __DIR__ . '/../../models/SemesterEducationalFormModel.php';
require_once __DIR__ . '/../../models/GlobalDataForEducationalDisciplineModel.php';
require_once __DIR__ . '/../../models/AssessmentCriteriaModel.php';
require_once __DIR__ . '/../../models/WorkingProgramLiteratureModel.php';
require_once __DIR__ . '/../../helpers/getEducationalFormVisualName.php';

use App\Models\WPDetailsModel;
use App\Models\SemesterModel;
use App\Models\ModuleModel;
use App\Models\ThemeModel;
use App\Models\WPInvolvedPersonModel;
use App\Models\SemesterEducationalFormModel;
use App\Models\GlobalDataForEducationalDisciplineModel;
use App\Models\AssessmentCriteriaModel;
use App\Models\WorkingProgramLiteratureModel;

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
		$workingProgramData->prerequisites,
		$workingProgramData->goal,
		$workingProgramData->tasks,
		$workingProgramData->competences,
		$workingProgramData->programResults,
		$workingProgramData->controlMeasures,
		$workingProgramData->studingMethods,
		$workingProgramData->examingMethods,
		$workingProgramData->code,
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

		$educationalForms = $semester->educationalForms->map(function ($educationalForm) {
			return new SemesterEducationalFormModel(
				$educationalForm->id,
				$educationalForm->educationalDisciplineSemesterId,
				$educationalForm->educationalFormId,
				$educationalForm->educationalForm->name,
				getEducationalFormVisualName($educationalForm->educationalForm->name)
			);
		})->toArray();

		return new SemesterModel(
			$semester->id,
			$semester->semesterNumber,
			$semester->examType,
			$modules,
			$semester->courseWork,
			$educationalForms
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

	$formattedGlobalData = $workingProgramData->globalData->map(function ($global) {
		$generalAssessmentCriteria = new AssessmentCriteriaModel(
			$global->generalAssessmentCriteriaForA,
			$global->generalAssessmentCriteriaForB,
			$global->generalAssessmentCriteriaForC,
			$global->generalAssessmentCriteriaForD,
			$global->generalAssessmentCriteriaForE,
			$global->generalAssessmentCriteriaForFX,
			$global->generalAssessmentCriteriaForF,
		);

		$lessonAssessmentCriteria = new AssessmentCriteriaModel(
			$global->lessonAssessmentCriteriaForA,
			$global->lessonAssessmentCriteriaForB,
			$global->lessonAssessmentCriteriaForC,
			$global->lessonAssessmentCriteriaForD,
			$global->lessonAssessmentCriteriaForE,
			$global->lessonAssessmentCriteriaForFX,
			$global->lessonAssessmentCriteriaForF,
		);

		$courseworkAssessmentCriteria = new AssessmentCriteriaModel(
			$global->courseworkAssessmentCriteriaForA,
			$global->courseworkAssessmentCriteriaForB,
			$global->courseworkAssessmentCriteriaForC,
			$global->courseworkAssessmentCriteriaForD,
			$global->courseworkAssessmentCriteriaForE,
			$global->courseworkAssessmentCriteriaForFX,
			$global->courseworkAssessmentCriteriaForF,
		);

		$examAssessmentCriteria = new AssessmentCriteriaModel(
			$global->examAssessmentCriteriaForA,
			$global->examAssessmentCriteriaForB,
			$global->examAssessmentCriteriaForC,
			$global->examAssessmentCriteriaForD,
			$global->examAssessmentCriteriaForE,
			$global->examAssessmentCriteriaForFX,
			$global->examAssessmentCriteriaForF,
		);

		return new GlobalDataForEducationalDisciplineModel(
			$global->universityName,
			$global->universityShortName,
			$global->academicRightsAndResponsibilities,
			$generalAssessmentCriteria,
			$lessonAssessmentCriteria,
			$courseworkAssessmentCriteria,
			$examAssessmentCriteria,
		);
	});

	$workingProgram->globalData = $formattedGlobalData;

	$formattedLiterature = $workingProgramData->literature->map(function ($literatureItem) {
		return new WorkingProgramLiteratureModel(
			$literatureItem->main,
			$literatureItem->supporting,
			$literatureItem->additional,
			$literatureItem->informationResources
		);
	});

	$workingProgram->literature = $formattedLiterature;

	return $workingProgram;
}
