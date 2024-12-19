<?php

require_once __DIR__ . '/../../models/WPDetailsModel.php';
require_once __DIR__ . '/../../models/PDFSemesterModel.php';
require_once __DIR__ . '/../../models/PDFModuleModel.php';
require_once __DIR__ . '/../../models/PDFThemeWithLessonsModel.php';
require_once __DIR__ . '/../../models/WPInvolvedPersonModel.php';
require_once __DIR__ . '/../../models/SemesterEducationalFormModel.php';
require_once __DIR__ . '/../../models/WorkingProgramLiteratureModel.php';
require_once __DIR__ . '/../../models/EducationalFormCourseworkHourModel.php';
require_once __DIR__ . '/../../models/SpecialtyModel.php';
require_once __DIR__ . '/../../models/EducationalProgramModel.php';
require_once __DIR__ . '/../getEducationalFormVisualName.php';
require_once __DIR__ . '/../getHoursSumForEducationalForms.php';
require_once __DIR__ . '/../getAllEducationalFormsAvailableInWorkingProgram.php';
require_once __DIR__ . '/getLessonWithEducationalFormLessonHour.php';
require_once __DIR__ . '/getEducationalFormHoursStructureForTheme.php';
require_once __DIR__ . '/getFormattedLessonsAndExamingsStructure.php';
require_once __DIR__ . '/getFormattedFacultiesData.php';

use App\Models\DepartmentModel;
use App\Models\WPDetailsModel;
use App\Models\PDFSemesterModel;
use App\Models\PDFModuleModel;
use App\Models\PDFThemeWithLessonsModel;
use App\Models\WPInvolvedPersonModel;
use App\Models\SemesterEducationalFormModel;
use App\Models\WorkingProgramLiteratureModel;
use App\Models\EducationalFormCourseworkHourModel;
use App\Models\EducationalProgramModel;
use App\Models\FacultyModel;
use App\Models\SpecialtyModel;

function getFullFormattedWorkingProgramDataForPDF($workingProgramData)
{
	// Створюємо модель загальних даних для робочої програми
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
		[],
		isset($workingProgramData->educationalProgramIds) ? json_decode($workingProgramData->educationalProgramIds) : [],
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

	// Відформатовуємо спеціальності
	$specialties = $workingProgramData->specialties->map(function ($specialty) {
		return new SpecialtyModel(
			$specialty->id,
			$specialty->spec_num_code,
			$specialty->spec
		);
	})->toArray();

	$workingProgram->specialties = $specialties;

	// Відформатовуємо освітні програми
	$educationalPrograms = $workingProgramData->educationalPrograms->map(function ($educationalProgram) {
		return new EducationalProgramModel(
			$educationalProgram->id,
			$educationalProgram->spec
		);
	})->toArray();

	$workingProgram->educationalPrograms = $educationalPrograms;

	// Відформатовуємо рівень вищої освіти
	$workingProgram->stydingLevel = getFormattedStydingLevelType($workingProgramData->stydingLevel);

	// Збираємо всі модулі
	$modulesInWorkingProgram = [];

	// Збираємо всі заняття по типах у всіх семестрах робочої програми
	$lectionsForWorkingProgram = [];
	$practicalsForWorkingProgram = [];
	$seminarsForWorkingProgram = [];
	$labsForWorkingProgram = [];
	$selfworksForWorkingProgram = [];

	// Обробляємо семестри робочої програми та трансформуємо їх у модель
	$formattedSemesters = $workingProgramData->semesters->map(function ($semester) use (
		&$modulesInWorkingProgram,
		&$lectionsForWorkingProgram,
		&$practicalsForWorkingProgram,
		&$seminarsForWorkingProgram,
		&$labsForWorkingProgram,
		&$selfworksForWorkingProgram,
	) {
		// Збираємо всі заняття по типах в семестрі
		$lectionsForSemester = [];
		$practicalsForSemester = [];
		$seminarsForSemester = [];
		$labsForSemester = [];
		$selfworksForSemester = [];

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
		$modules = $semester->modules->map(function ($module) use (&$lectionsForSemester, &$practicalsForSemester, &$seminarsForSemester, &$labsForSemester, &$selfworksForSemester, &$educationalForms) {
			// Збираємо всі заняття по типах в модулі
			$lectionsForModule = [];
			$practicalsForModule = [];
			$seminarsForModule = [];
			$labsForModule = [];
			$selfworksForModule = [];

			// Обробляємо теми модуля та трансформуємо їх у модель
			$themes = $module->themes->map(function ($theme) use (
				&$lectionsForModule,
				&$practicalsForModule,
				&$seminarsForModule,
				&$labsForModule,
				&$selfworksForModule,
				&$educationalForms,
			) {
				// Обробляємо лекції до теми та трансформуємо їх у модель
				$lections = getLessonWithEducationalFormLessonHour($theme->lections);
				$lectionsForModule = array_merge($lectionsForModule, $lections);

				// Обробляємо практичні до теми та трансформуємо їх у модель
				$practicals = getLessonWithEducationalFormLessonHour($theme->practicals);
				$practicalsForModule = array_merge($practicalsForModule, $practicals);

				// Обробляємо семінари до теми та трансформуємо їх у модель
				$seminars = getLessonWithEducationalFormLessonHour($theme->seminars);
				$seminarsForModule = array_merge($seminarsForModule, $seminars);

				// Обробляємо лабораторні до теми та трансформуємо їх у модель
				$labs = getLessonWithEducationalFormLessonHour($theme->labs);
				$labsForModule = array_merge($labsForModule, $labs);

				// Обробляємо самостійні до теми та трансформуємо їх у модель
				$selfworks = getLessonWithEducationalFormLessonHour($theme->selfworks);
				$selfworksForModule = array_merge($selfworksForModule, $selfworks);

				// Рахуємо всі години різних занять для теми
				$educationalFormHoursStructure = [];

				foreach ($educationalForms as $educationalForm) {
					$educationalFormHoursStructure[$educationalForm->colName] = getEducationalFormHoursStructureForTheme(
						$educationalForm->colName,
						$lections,
						$practicals,
						$seminars,
						$labs,
						$selfworks
					);
				};

				return new PDFThemeWithLessonsModel(
					$theme->id,
					$theme->name ?? "",
					$theme->description ?? "",
					$theme->themeNumber,
					$lections,
					$practicals,
					$seminars,
					$labs,
					$selfworks,
					$educationalForms,
					$educationalFormHoursStructure
				);
			})->toArray();

			// Додаємо заняття з модуля у масив усіх занять семестра по типах
			$lectionsForSemester = array_merge($lectionsForSemester, $lectionsForModule);
			$practicalsForSemester = array_merge($practicalsForSemester, $practicalsForModule);
			$seminarsForSemester = array_merge($seminarsForSemester, $seminarsForModule);
			$labsForSemester = array_merge($labsForSemester, $labsForModule);
			$selfworksForSemester = array_merge($selfworksForSemester, $selfworksForModule);

			// Рахуємо всі години різних занять для модуля
			$totalEducationalFormHoursStructureForModule = [];

			foreach ($educationalForms as $educationalForm) {
				$totalEducationalFormHoursStructureForModule[$educationalForm->colName] = getEducationalFormHoursStructureForTheme(
					$educationalForm->colName,
					$lectionsForModule,
					$practicalsForModule,
					$seminarsForModule,
					$labsForModule,
					$selfworksForModule
				);
			};

			return new PDFModuleModel(
				$module->id,
				$module->isColloquiumExists,
				$module->name ?? "",
				$module->moduleNumber,
				$module->colloquiumPoints,
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
		$selfworksForWorkingProgram = array_merge($selfworksForWorkingProgram, $selfworksForSemester);

		// Рахуємо всі години різних занять для семестра
		$totalHoursForLections = getHoursSumForEducationalForms($lectionsForSemester, $educationalForms);
		$totalHoursForPracticals = getHoursSumForEducationalForms($practicalsForSemester, $educationalForms);
		$totalHoursForSeminars = getHoursSumForEducationalForms($seminarsForSemester, $educationalForms);
		$totalHoursForLabs = getHoursSumForEducationalForms($labsForSemester, $educationalForms);
		$totalHoursForSelfworks = getHoursSumForEducationalForms($selfworksForSemester, $educationalForms);

		// Рахуємо всі години різних занять для семестра
		$totalEducationalFormHoursStructureForSemester = [];

		foreach ($educationalForms as $educationalForm) {
			$totalEducationalFormHoursStructureForSemester[$educationalForm->colName] = getEducationalFormHoursStructureForTheme(
				$educationalForm->colName,
				$lectionsForSemester,
				$practicalsForSemester,
				$seminarsForSemester,
				$labsForSemester,
				$selfworksForSemester
			);
		};

		// Додаємо години для курсової роботи
		$courseworkHours = $semester->educationalFormCourseworkHours->map(function ($hours) {
			return new EducationalFormCourseworkHourModel(
				$hours->id,
				$hours->educationalFormId,
				$hours->semesterEducationalForm->educationalForm->name,
				$hours->hours
			);
		})->toArray();

		return new PDFSemesterModel(
			$semester->id,
			$semester->isCourseworkExists,
			$semester->courseworkAssessmentComponents,
			$semester->semesterNumber,
			$semester->examType,
			$modules,
			$educationalForms,
			$lectionsForSemester,
			$practicalsForSemester,
			$seminarsForSemester,
			$labsForSemester,
			$selfworksForSemester,
			$totalHoursForLections,
			$totalHoursForPracticals,
			$totalHoursForSeminars,
			$totalHoursForLabs,
			$totalHoursForSelfworks,
			$totalEducationalFormHoursStructureForSemester,
			$courseworkHours
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
	$workingProgram->totalHoursForSelfworks = getHoursSumForEducationalForms($selfworksForWorkingProgram, $availableEducationalFormsInWorkingProgram);

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
			$involvedPerson->positionAndMinutesOfMeeting,
			$involvedPerson->degree,
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
		$workingProgramData->educationalProgramGuarantor->positionAndMinutesOfMeeting,
		$workingProgramData->educationalProgramGuarantor->degree
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
		$workingProgramData->headOfDepartment->positionAndMinutesOfMeeting,
		$workingProgramData->headOfDepartment->degree
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
		$workingProgramData->headOfCommission->positionAndMinutesOfMeeting,
		$workingProgramData->headOfCommission->degree
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
		$workingProgramData->approvedBy->positionAndMinutesOfMeeting,
		$workingProgramData->approvedBy->degree
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
		$workingProgramData->docApprovedBy->positionAndMinutesOfMeeting,
		$workingProgramData->docApprovedBy->degree
	) : null;

	// Додаємо глобальні дані
	$workingProgram->globalData = getFullFormattedWorkingProgramGlobalData($workingProgramData->globalData);

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
