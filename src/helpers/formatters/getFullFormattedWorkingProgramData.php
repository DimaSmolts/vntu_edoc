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
		$workingProgramData->facultyName ?? '',
		$workingProgramData->departmentName ?? '',
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

	$generalAssessmentCriteria = isset($workingProgramData->globalData) ? new AssessmentCriteriaModel(
		$workingProgramData->globalData->generalAssessmentCriteriaForA,
		$workingProgramData->globalData->generalAssessmentCriteriaForB,
		$workingProgramData->globalData->generalAssessmentCriteriaForC,
		$workingProgramData->globalData->generalAssessmentCriteriaForD,
		$workingProgramData->globalData->generalAssessmentCriteriaForE,
		$workingProgramData->globalData->generalAssessmentCriteriaForFX,
		$workingProgramData->globalData->generalAssessmentCriteriaForF,
	) : null;

	$lessonAssessmentCriteria = isset($workingProgramData->globalData) ? new AssessmentCriteriaModel(
		$workingProgramData->globalData->lessonAssessmentCriteriaForA,
		$workingProgramData->globalData->lessonAssessmentCriteriaForB,
		$workingProgramData->globalData->lessonAssessmentCriteriaForC,
		$workingProgramData->globalData->lessonAssessmentCriteriaForD,
		$workingProgramData->globalData->lessonAssessmentCriteriaForE,
		$workingProgramData->globalData->lessonAssessmentCriteriaForFX,
		$workingProgramData->globalData->lessonAssessmentCriteriaForF,
	) : null;

	$courseworkAssessmentCriteria = isset($workingProgramData->globalData) ? new AssessmentCriteriaModel(
		$workingProgramData->globalData->courseworkAssessmentCriteriaForA,
		$workingProgramData->globalData->courseworkAssessmentCriteriaForB,
		$workingProgramData->globalData->courseworkAssessmentCriteriaForC,
		$workingProgramData->globalData->courseworkAssessmentCriteriaForD,
		$workingProgramData->globalData->courseworkAssessmentCriteriaForE,
		$workingProgramData->globalData->courseworkAssessmentCriteriaForFX,
		$workingProgramData->globalData->courseworkAssessmentCriteriaForF,
	) : null;

	$examAssessmentCriteria = isset($workingProgramData->globalData) ? new AssessmentCriteriaModel(
		$workingProgramData->globalData->examAssessmentCriteriaForA,
		$workingProgramData->globalData->examAssessmentCriteriaForB,
		$workingProgramData->globalData->examAssessmentCriteriaForC,
		$workingProgramData->globalData->examAssessmentCriteriaForD,
		$workingProgramData->globalData->examAssessmentCriteriaForE,
		$workingProgramData->globalData->examAssessmentCriteriaForFX,
		$workingProgramData->globalData->examAssessmentCriteriaForF,
	) : null;

	$formattedGlobalData = new GlobalDataForEducationalDisciplineModel(
		isset($workingProgramData->globalData) ? $workingProgramData->globalData->universityName : '',
		isset($workingProgramData->globalData) ? $workingProgramData->globalData->universityShortName : '',
		isset($workingProgramData->globalData) ? $workingProgramData->globalData->academicRightsAndResponsibilities : '',
		$generalAssessmentCriteria,
		$lessonAssessmentCriteria,
		$courseworkAssessmentCriteria,
		$examAssessmentCriteria,
	);

	$workingProgram->globalData = $formattedGlobalData;

	$formattedLiterature = isset($workingProgramData->literature) ? new WorkingProgramLiteratureModel(
		$workingProgramData->literature->main,
		$workingProgramData->literature->supporting,
		$workingProgramData->literature->additional,
		$workingProgramData->literature->informationResources
	) : null;

	$workingProgram->literature = $formattedLiterature;

	return $workingProgram;
}
