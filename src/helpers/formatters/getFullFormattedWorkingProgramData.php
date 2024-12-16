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
		$workingProgramData->stydingLevelId ?? '',
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
		$surname = $name = $patronymicName = '';

		if (isset($involvedPerson->person->t_name)) {
			list($surname, $name, $patronymicName) = explode(" ", $involvedPerson->person->t_name);
		}

		return new WPInvolvedPersonModel(
			$involvedPerson->id,
			$involvedPerson->personId,
			$involvedPerson->involvedPersonRoleId,
			$surname,
			$name,
			$patronymicName,
			$involvedPerson->person->workPositionData->name,
			$involvedPerson->involvedRole->role,
			$involvedPerson->positionAndMinutesOfMeeting,
			$involvedPerson->degree,
		);
	})->toArray();

	$workingProgram->createdByPersons = $formattedCreatedByPersons;

	$educationalProgramGuarantorSurname = $educationalProgramGuarantorName = $educationalProgramGuarantorPatronymicName = '';

	if (isset($workingProgramData->educationalProgramGuarantor->person->t_name)) {
		list($educationalProgramGuarantorSurname, $educationalProgramGuarantorName, $educationalProgramGuarantorPatronymicName) = explode(" ", $workingProgramData->educationalProgramGuarantor->person->t_name);
	}

	$workingProgram->educationalProgramGuarantor = isset($workingProgramData->educationalProgramGuarantor) ? new WPInvolvedPersonModel(
		$workingProgramData->educationalProgramGuarantor->id,
		$workingProgramData->educationalProgramGuarantor->personId,
		$workingProgramData->educationalProgramGuarantor->involvedPersonRoleId,
		$educationalProgramGuarantorSurname,
		$educationalProgramGuarantorName,
		$educationalProgramGuarantorPatronymicName,
		isset($workingProgramData->educationalProgramGuarantor->person->workPositionData->name) ? $workingProgramData->educationalProgramGuarantor->person->workPositionData->name : '',
		isset($workingProgramData->educationalProgramGuarantor->involvedRole->role) ? $workingProgramData->educationalProgramGuarantor->involvedRole->role : '',
		$workingProgramData->educationalProgramGuarantor->positionAndMinutesOfMeeting,
		$workingProgramData->educationalProgramGuarantor->degree
	) : null;

	$headOfDepartmentSurname = $headOfDepartmentName = $headOfDepartmentPatronymicName = '';

	if (isset($workingProgramData->headOfDepartment->person->t_name)) {
		list($headOfDepartmentSurname, $headOfDepartmentName, $headOfDepartmentPatronymicName) = explode(" ", $workingProgramData->headOfDepartment->person->t_name);
	}

	$workingProgram->headOfDepartment = isset($workingProgramData->headOfDepartment) ? new WPInvolvedPersonModel(
		$workingProgramData->headOfDepartment->id,
		$workingProgramData->headOfDepartment->personId,
		$workingProgramData->headOfDepartment->involvedPersonRoleId,
		$headOfDepartmentSurname,
		$headOfDepartmentName,
		$headOfDepartmentPatronymicName,
		isset($workingProgramData->headOfDepartment->person->workPositionData->name) ? $workingProgramData->headOfDepartment->person->workPositionData->name : '',
		isset($workingProgramData->headOfDepartment->involvedRole->role) ? $workingProgramData->headOfDepartment->involvedRole->role : '',
		$workingProgramData->headOfDepartment->positionAndMinutesOfMeeting,
		$workingProgramData->headOfDepartment->degree
	) : null;

	$headOfCommissionSurname = $headOfCommissionName = $headOfCommissionPatronymicName = '';

	if (isset($workingProgramData->headOfCommission->person->t_name)) {
		list($headOfCommissionSurname, $headOfCommissionName, $headOfCommissionPatronymicName) = explode(" ", $workingProgramData->headOfCommission->person->t_name);
	}

	$workingProgram->headOfCommission = isset($workingProgramData->headOfCommission) ? new WPInvolvedPersonModel(
		$workingProgramData->headOfCommission->id,
		$workingProgramData->headOfCommission->personId,
		$workingProgramData->headOfCommission->involvedPersonRoleId,
		$headOfCommissionSurname,
		$headOfCommissionName,
		$headOfCommissionPatronymicName,
		isset($workingProgramData->headOfCommission->person->workPositionData->name) ? $workingProgramData->headOfCommission->person->workPositionData->name : '',
		isset($workingProgramData->headOfCommission->involvedRole->role) ? $workingProgramData->headOfCommission->involvedRole->role : '',
		$workingProgramData->headOfCommission->positionAndMinutesOfMeeting,
		$workingProgramData->headOfCommission->degree
	) : null;

	$approvedBySurname = $approvedByName = $approvedByPatronymicName = '';

	if (isset($workingProgramData->approvedBy->person->t_name)) {
		list($approvedBySurname, $approvedByName, $approvedByPatronymicName) = explode(" ", $workingProgramData->approvedBy->person->t_name);
	}

	$workingProgram->approvedBy = isset($workingProgramData->approvedBy) ? new WPInvolvedPersonModel(
		$workingProgramData->approvedBy->id,
		$workingProgramData->approvedBy->personId,
		$workingProgramData->approvedBy->involvedPersonRoleId,
		$approvedBySurname,
		$approvedByName,
		$approvedByPatronymicName,
		isset($workingProgramData->approvedBy->person->workPositionData->name) ? $workingProgramData->approvedBy->person->workPositionData->name : '',
		isset($workingProgramData->approvedBy->involvedRole->role) ? $workingProgramData->approvedBy->involvedRole->role : '',
		$workingProgramData->approvedBy->positionAndMinutesOfMeeting,
		$workingProgramData->approvedBy->degree
	) : null;

	$docApprovedBySurname = $docApprovedByName = $docApprovedByPatronymicName = '';

	if (isset($workingProgramData->docApprovedBy->person->t_name)) {
		list($docApprovedBySurname, $docApprovedByName, $docApprovedByPatronymicName) = explode(" ", $workingProgramData->docApprovedBy->person->t_name);
	}

	$workingProgram->docApprovedBy = isset($workingProgramData->docApprovedBy) ? new WPInvolvedPersonModel(
		$workingProgramData->docApprovedBy->id,
		$workingProgramData->docApprovedBy->personId,
		$workingProgramData->docApprovedBy->involvedPersonRoleId,
		$docApprovedBySurname,
		$docApprovedByName,
		$docApprovedByPatronymicName,
		isset($workingProgramData->docApprovedBy->person->workPositionData->name) ? $workingProgramData->docApprovedBy->person->workPositionData->name : '',
		isset($workingProgramData->docApprovedBy->involvedRole->role) ? $workingProgramData->docApprovedBy->involvedRole->role : '',
		$workingProgramData->docApprovedBy->positionAndMinutesOfMeeting,
		$workingProgramData->docApprovedBy->degree
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
