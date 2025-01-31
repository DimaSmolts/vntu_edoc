<?php

require_once __DIR__ . '/../../models/WPDetailsModel.php';
require_once __DIR__ . '/../../models/PDFSemesterModel.php';
require_once __DIR__ . '/../../models/PDFModuleModel.php';
require_once __DIR__ . '/../../models/PDFThemeWithLessonsModel.php';
require_once __DIR__ . '/../../models/WPInvolvedPersonModel.php';
require_once __DIR__ . '/../../models/SemesterEducationalFormModel.php';
require_once __DIR__ . '/../../models/WorkingProgramLiteratureModel.php';
require_once __DIR__ . '/../../models/SpecialtyModel.php';
require_once __DIR__ . '/../../models/FieldOfStudyModel.php';
require_once __DIR__ . '/../../models/EducationalProgramModel.php';
require_once __DIR__ . '/../getEducationalFormVisualName.php';
require_once __DIR__ . '/../getHoursSumForEducationalForms.php';
require_once __DIR__ . '/../getHoursSumForSelfworksForEducationalForms.php';
require_once __DIR__ . '/../getHoursSumForSelfworksForEducationalFormsForWP.php';
require_once __DIR__ . '/../getTotalHoursAmountInWp.php';
require_once __DIR__ . '/../getAllEducationalFormsAvailableInWorkingProgram.php';
require_once __DIR__ . '/getLessonWithEducationalFormLessonHour.php';
require_once __DIR__ . '/getEducationalFormHoursStructureForTheme.php';
require_once __DIR__ . '/getFormattedLessonsAndExamingsStructure.php';
require_once __DIR__ . '/getFormattedFacultiesData.php';
require_once __DIR__ . '/getFullFormattedAssessmentCriterias.php';
require_once __DIR__ . '/getFormattedStydingLevelType.php';
require_once __DIR__ . '/getFormattedSubjectType.php';
require_once __DIR__ . '/../getTaskId.php';
require_once __DIR__ . '/../getIsTypeOfWorkExists.php';

use App\Models\DepartmentModel;
use App\Models\WPDetailsModel;
use App\Models\PDFSemesterModel;
use App\Models\PDFModuleModel;
use App\Models\PDFThemeWithLessonsModel;
use App\Models\WPInvolvedPersonModel;
use App\Models\SemesterEducationalFormModel;
use App\Models\WorkingProgramLiteratureModel;
use App\Models\EducationalProgramModel;
use App\Models\FacultyModel;
use App\Models\SpecialtyModel;
use App\Models\FieldOfStudyModel;

function getFullFormattedWorkingProgramDataForPDF($workingProgramData, $globalWPData, $selfworkSemestersData)
{
	// Створюємо модель загальних даних для робочої програми
	$workingProgram = new WPDetailsModel(
		$workingProgramData->id,
		$workingProgramData->wpCreatorId,
		$workingProgramData->regularYear,
		$workingProgramData->academicYear,
		$workingProgramData->facultyId,
		$workingProgramData->departmentId,
		$workingProgramData->disciplineName ?? '',
		$workingProgramData->stydingLevelId ?? '',
		$workingProgramData->subjectTypeId ?? '',
		isset($workingProgramData->fieldsOfStudyIds) ? json_decode($workingProgramData->fieldsOfStudyIds) : [],
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

	// Відформатовуємо галузі знань
	$fieldsOfStudy = $workingProgramData->fieldsOfStudy->map(function ($fieldOfStudy) {
		return new FieldOfStudyModel(
			$fieldOfStudy->id,
			$fieldOfStudy->name
		);
	})->toArray();

	$workingProgram->fieldsOfStudy = $fieldsOfStudy;

	// Відформатовуємо спеціальності
	$specialties = $workingProgramData->specialties->map(function ($specialty) {
		return new SpecialtyModel(
			$specialty->id,
			$specialty->spec_num_code,
			$specialty->name
		);
	})->toArray();

	$workingProgram->specialties = $specialties;

	// Відформатовуємо освітні програми
	$educationalPrograms = $workingProgramData->educationalPrograms->map(function ($educationalProgram) {
		return new EducationalProgramModel(
			$educationalProgram->id,
			$educationalProgram->name
		);
	})->toArray();

	$workingProgram->educationalPrograms = $educationalPrograms;

	// Відформатовуємо рівень вищої освіти
	$workingProgram->stydingLevel = isset($workingProgramData->stydingLevel) ? getFormattedStydingLevelType($workingProgramData->stydingLevel) : null;

	// Відформатовуємо тип навчання
	$workingProgram->subjectType = isset($workingProgramData->subjectType) ? getFormattedSubjectType($workingProgramData->subjectType) : null;

	// Збираємо всі модулі
	$modulesInWorkingProgram = [];

	// Збираємо всі заняття по типах у всіх семестрах робочої програми
	$lectionsForWorkingProgram = [];
	$practicalsForWorkingProgram = [];
	$seminarsForWorkingProgram = [];
	$labsForWorkingProgram = [];
	$totalHoursForSelfworksBySemesters = [];

	// Обробляємо семестри робочої програми та трансформуємо їх у модель
	$formattedSemesters = $workingProgramData->semesters->map(function ($semester) use (
		&$modulesInWorkingProgram,
		&$lectionsForWorkingProgram,
		&$practicalsForWorkingProgram,
		&$seminarsForWorkingProgram,
		&$labsForWorkingProgram,
		&$totalHoursForSelfworksBySemesters,
		&$selfworkSemestersData,
	) {
		$taskTypeIds = getTaskId();

		$selfworkData = null;

		foreach ($selfworkSemestersData as $selfworkSemesterData) {
			if ($selfworkSemesterData->semesterId === $semester->id) {
				$selfworkData = $selfworkSemesterData;
			}
		}

		// Збираємо всі заняття по типах в семестрі
		$lectionsForSemester = [];
		$practicalsForSemester = [];
		$seminarsForSemester = [];
		$labsForSemester = [];

		// Обробляємо всі обрані форми навчання для даного семестру та трансформуємо їх у модель
		$educationalForms = $semester->educationalForms->map(function ($educationalForm) {
			return new SemesterEducationalFormModel(
				$educationalForm->id,
				$educationalForm->educationalDisciplineSemesterId,
				$educationalForm->educationalFormId,
				$educationalForm->educationalForm->name,
				getEducationalFormVisualName($educationalForm->educationalForm->name)
			);
		})->toArray();

		// Обробляємо модулі семестра та трансформуємо їх у модель
		$modules = $semester->modules->map(function ($module) use (
			&$lectionsForSemester,
			&$practicalsForSemester,
			&$seminarsForSemester,
			&$labsForSemester,
			&$educationalForms,
			&$taskTypeIds,
		) {
			// Збираємо всі заняття по типах в модулі
			$lectionsForModule = [];

			// Обробляємо практичні до модуля та трансформуємо їх у модель
			$practicalsForModule = getLessonWithEducationalFormLessonHour($module->practicals);
			// Обробляємо семінари до модуля та трансформуємо їх у модель
			$seminarsForModule = getLessonWithEducationalFormLessonHour($module->seminars);
			// Обробляємо лабораторні до теми та трансформуємо їх у модель
			$labsForModule = getLessonWithEducationalFormLessonHour($module->labs);

			// Обробляємо теми модуля та трансформуємо їх у модель
			$themes = $module->themes->map(function ($theme) use (
				&$lectionsForModule,
				&$educationalForms,
			) {
				// Обробляємо лекції до теми та трансформуємо їх у модель
				$lections = getLessonWithEducationalFormLessonHour($theme->lections);
				$lectionsForModule = array_merge($lectionsForModule, $lections);

				// Рахуємо всі години різних занять для теми
				$educationalFormHoursStructure = [];

				foreach ($educationalForms as $educationalForm) {
					$educationalFormHoursStructure[$educationalForm->colName] = getEducationalFormHoursStructureForTheme(
						$educationalForm->colName,
						$lections,
						[],
						[],
						[]
					);
				};

				return new PDFThemeWithLessonsModel(
					$theme->id,
					$theme->name ?? "",
					$theme->description ?? "",
					$theme->themeNumber,
					$lections,
					$educationalForms,
					$educationalFormHoursStructure
				);
			})->toArray();

			// Додаємо заняття з модуля у масив усіх занять семестра по типах
			$lectionsForSemester = array_merge($lectionsForSemester, $lectionsForModule);
			$practicalsForSemester = array_merge($practicalsForSemester, $practicalsForModule);
			$seminarsForSemester = array_merge($seminarsForSemester, $seminarsForModule);
			$labsForSemester = array_merge($labsForSemester, $labsForModule);

			// Рахуємо всі години різних занять для модуля
			$totalEducationalFormHoursStructureForModule = [];

			foreach ($educationalForms as $educationalForm) {
				$totalEducationalFormHoursStructureForModule[$educationalForm->colName] = getEducationalFormHoursStructureForTheme(
					$educationalForm->colName,
					$lectionsForModule,
					$practicalsForModule,
					$seminarsForModule,
					$labsForModule
				);
			};

			return new PDFModuleModel(
				$module->id,
				getIsTypeOfWorkExistsInModule($module, $taskTypeIds->colloquium),
				getIsTypeOfWorkExistsInModule($module, $taskTypeIds->controlWork),
				$module->name ?? "",
				$module->moduleNumber,
				$themes,
				$totalEducationalFormHoursStructureForModule
			);
		})->toArray();

		// Додаємо модулі з семестра у масив усіх модулів
		$modulesInWorkingProgram = array_merge($modulesInWorkingProgram, $modules);

		// Додаємо заняття з семестра у масив усіх занять по типах
		$lectionsForWorkingProgram = array_merge($lectionsForWorkingProgram, $lectionsForSemester);
		$practicalsForWorkingProgram = array_merge($practicalsForWorkingProgram, $practicalsForSemester);
		$seminarsForWorkingProgram = array_merge($seminarsForWorkingProgram, $seminarsForSemester);
		$labsForWorkingProgram = array_merge($labsForWorkingProgram, $labsForSemester);

		// Рахуємо всі години різних занять для семестра
		$totalHoursForLections = getHoursSumForEducationalForms($lectionsForSemester, $educationalForms);
		$totalHoursForPracticals = getHoursSumForEducationalForms($practicalsForSemester, $educationalForms);
		$totalHoursForSeminars = getHoursSumForEducationalForms($seminarsForSemester, $educationalForms);
		$totalHoursForLabs = getHoursSumForEducationalForms($labsForSemester, $educationalForms);
		$totalHoursForSelfworks = getHoursSumForSelfworksForEducationalForms($selfworkData, $educationalForms);

		$totalHoursForSelfworksBySemesters[$semester->id] = $totalHoursForSelfworks;

		// Рахуємо всі години різних занять для семестра
		$totalEducationalFormHoursStructureForSemester = [];

		foreach ($educationalForms as $educationalForm) {
			$totalEducationalFormHoursStructureForSemester[$educationalForm->colName] = getEducationalFormHoursStructureForTheme(
				$educationalForm->colName,
				$lectionsForSemester,
				$practicalsForSemester,
				$seminarsForSemester,
				$labsForSemester
			);
		};

		$courseTask = getCourseTask($semester);

		return new PDFSemesterModel(
			$semester->id,
			getIsTypeOfWorkExistsInSemester($semester, $taskTypeIds->coursework),
			getIsTypeOfWorkExistsInSemester($semester, $taskTypeIds->courseProject),
			isset($courseTask) ? $courseTask->assessmentComponents : '',
			$semester->semesterNumber,
			$semester->examTypeId,
			isset($semester->examType) ? $semester->examType->e_name : '',
			$modules,
			$educationalForms,
			$lectionsForSemester,
			$practicalsForSemester,
			$seminarsForSemester,
			$labsForSemester,
			$totalHoursForLections,
			$totalHoursForPracticals,
			$totalHoursForSeminars,
			$totalHoursForLabs,
			$totalHoursForSelfworks,
			$totalEducationalFormHoursStructureForSemester
		);
	})->toArray();

	// Додаємо дані про факультет, якщо факультет обраний
	if ($workingProgramData->facultyId) {
		$workingProgram->faculty = new FacultyModel(
			$workingProgramData->faculty->id,
			$workingProgramData->faculty->d_name,
		);
	}

	// Додаємо дані про кафедру, якщо кафедра обрана
	if ($workingProgramData->departmentId) {
		$workingProgram->department = new DepartmentModel(
			$workingProgramData->department->id,
			$workingProgramData->department->d_name,
		);
	}

	// Додаємо дані про семестри в робочу програму
	$workingProgram->semesters = $formattedSemesters;

	// Визначаємо кількість навчальних форм обраних у всіх семестрах
	$availableEducationalFormsInWorkingProgram = getAllEducationalFormsAvailableInWorkingProgram($formattedSemesters);
	$workingProgram->availableEducationalForms = $availableEducationalFormsInWorkingProgram;

	// Рахуємо всі години різних занять для робочої програми
	$workingProgram->totalHoursForLections = getHoursSumForEducationalForms($lectionsForWorkingProgram, $availableEducationalFormsInWorkingProgram);
	$workingProgram->totalHoursForPracticals = getHoursSumForEducationalForms($practicalsForWorkingProgram, $availableEducationalFormsInWorkingProgram);
	$workingProgram->totalHoursForSeminars = getHoursSumForEducationalForms($seminarsForWorkingProgram, $availableEducationalFormsInWorkingProgram);
	$workingProgram->totalHoursForLabs = getHoursSumForEducationalForms($labsForWorkingProgram, $availableEducationalFormsInWorkingProgram);
	$workingProgram->totalHoursForSelfworks = getHoursSumForSelfworksForEducationalFormsForWP($totalHoursForSelfworksBySemesters);
	$workingProgram->totalHoursAmountInWp = getTotalHoursAmountInWp(
		totalHoursForLections: $workingProgram->totalHoursForLections,
		totalHoursForPracticals: $workingProgram->totalHoursForPracticals,
		totalHoursForSeminars: $workingProgram->totalHoursForSeminars,
		totalHoursForLabs: $workingProgram->totalHoursForLabs,
		totalHoursForSelfworks: $workingProgram->totalHoursForSelfworks,
	);

	//Обчислюємо кількість модулів у робочій програмі та додаємо до інформації про робочу програму
	$workingProgram->modulesInWorkingProgramAmount = count($modulesInWorkingProgram);

	// Обробляємо дані про людину, яка створила робочу програму, та трансформуємо у модель
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
			$involvedPerson->position,
			$involvedPerson->degree,
			$involvedPerson->minutesOfMeeting,
		);
	})->toArray();

	// Додаємо дані про людину, яка створила робочу програму, в інформацію про робочу програму
	$workingProgram->createdByPersons = $formattedCreatedByPersons;

	// Додаємо дані про людину, яка є гарантом
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
		$workingProgramData->educationalProgramGuarantor->position,
		$workingProgramData->educationalProgramGuarantor->degree,
		$workingProgramData->educationalProgramGuarantor->minutesOfMeeting,
	) : null;

	// Додаємо дані про людину, яка є зав. кафедри
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
		$workingProgramData->headOfDepartment->position,
		$workingProgramData->headOfDepartment->degree,
		$workingProgramData->headOfDepartment->minutesOfMeeting,
	) : null;

	// Додаємо дані про людину, яка є головою комісії/ради
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
		$workingProgramData->headOfCommission->position,
		$workingProgramData->headOfCommission->degree,
		$workingProgramData->headOfCommission->minutesOfMeeting,
	) : null;

	// Додаємо дані про людину, яка затвердила робочу програму
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
		$workingProgramData->approvedBy->position,
		$workingProgramData->approvedBy->degree,
		$workingProgramData->approvedBy->minutesOfMeeting,
	) : null;

	// Додаємо дані про людину, яка затвердила документ
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
		$workingProgramData->docApprovedBy->position,
		$workingProgramData->docApprovedBy->degree,
		$workingProgramData->docApprovedBy->minutesOfMeeting,
	) : null;

	// Додаємо глобальні дані
	$workingProgram->globalData = getFullFormattedWorkingProgramGlobalData($globalWPData);

	// Додаємо критерії оцінювання
	$workingProgram->assessmentCriterias = getFullFormattedAssessmentCriterias($workingProgramData);

	// Додаємо літературу
	$formattedLiterature = isset($workingProgramData->literature) ? new WorkingProgramLiteratureModel(
		$workingProgramData->literature->main,
		$workingProgramData->literature->supporting,
		$workingProgramData->literature->additional,
		$workingProgramData->literature->informationResources
	) : null;

	$workingProgram->literature = $formattedLiterature;

	// Додаємо структуру уроків та типів контролю
	$workingProgram->lessonsAndExamingsStructure = getFormattedLessonsAndExamingsStructure($workingProgramData);

	return $workingProgram;
};
