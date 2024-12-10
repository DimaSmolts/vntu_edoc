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
			$involvedPerson->person->name,
			$involvedPerson->person->positionData->brief,
			$involvedPerson->involvedRole->role,
			$involvedPerson->positionAndMinutesOfMeeting
		);
	})->toArray();

	$workingProgram->createdByPersons = $formattedCreatedByPersons;

	$workingProgram->educationalProgramGuarantor = isset($workingProgramData->educationalProgramGuarantor) ? new WPInvolvedPersonModel(
		$workingProgramData->educationalProgramGuarantor->id,
		$workingProgramData->educationalProgramGuarantor->personId,
		$workingProgramData->educationalProgramGuarantor->involvedPersonRoleId,
		$workingProgramData->educationalProgramGuarantor->person->t_name,
		$workingProgramData->educationalProgramGuarantor->person->positionData->name,
		$workingProgramData->educationalProgramGuarantor->involvedRole->role,
		$workingProgramData->educationalProgramGuarantor->positionAndMinutesOfMeeting
	) : null;

	$workingProgram->headOfDepartment = isset($workingProgramData->headOfDepartment) ? new WPInvolvedPersonModel(
		$workingProgramData->headOfDepartment->id,
		$workingProgramData->headOfDepartment->personId,
		$workingProgramData->headOfDepartment->involvedPersonRoleId,
		$workingProgramData->headOfDepartment->person->t_name,
		$workingProgramData->headOfDepartment->person->positionData->name,
		$workingProgramData->headOfDepartment->involvedRole->role,
		$workingProgramData->headOfDepartment->positionAndMinutesOfMeeting
	) : null;

	$workingProgram->headOfCommission = isset($workingProgramData->headOfCommission) ? new WPInvolvedPersonModel(
		$workingProgramData->headOfCommission->id,
		$workingProgramData->headOfCommission->personId,
		$workingProgramData->headOfCommission->involvedPersonRoleId,
		$workingProgramData->headOfCommission->person->t_name,
		$workingProgramData->headOfCommission->person->positionData->name,
		$workingProgramData->headOfCommission->involvedRole->role,
		$workingProgramData->headOfCommission->positionAndMinutesOfMeeting
	) : null;

	$workingProgram->approvedBy = isset($workingProgramData->approvedBy) ? new WPInvolvedPersonModel(
		$workingProgramData->approvedBy->id,
		$workingProgramData->approvedBy->personId,
		$workingProgramData->approvedBy->involvedPersonRoleId,
		$workingProgramData->approvedBy->person->t_name,
		$workingProgramData->approvedBy->person->positionData->name,
		$workingProgramData->approvedBy->involvedRole->role,
		$workingProgramData->approvedBy->positionAndMinutesOfMeeting
	) : null;

	$workingProgram->docApprovedBy = isset($workingProgramData->docApprovedBy) ? new WPInvolvedPersonModel(
		$workingProgramData->docApprovedBy->id,
		$workingProgramData->docApprovedBy->personId,
		$workingProgramData->docApprovedBy->involvedPersonRoleId,
		$workingProgramData->docApprovedBy->person->t_name,
		$workingProgramData->docApprovedBy->person->positionData->name,
		$workingProgramData->docApprovedBy->involvedRole->role,
		$workingProgramData->docApprovedBy->positionAndMinutesOfMeeting
	) : null;

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
