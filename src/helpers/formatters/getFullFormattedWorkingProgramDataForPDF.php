<?php

require_once __DIR__ . '/../../models/WPDetailsModel.php';
require_once __DIR__ . '/../../models/PDFSemesterModel.php';
require_once __DIR__ . '/../../models/PDFModuleModel.php';
require_once __DIR__ . '/../../models/PDFThemeWithLessonsModel.php';
require_once __DIR__ . '/../../models/WPInvolvedPersonModel.php';
require_once __DIR__ . '/../../models/SemesterEducationalFormModel.php';
require_once __DIR__ . '/../getEducationalFormVisualName.php';
require_once __DIR__ . '/../getHoursSumForEducationalForms.php';
require_once __DIR__ . '/getLessonWithEducationalFormLessonHour.php';
require_once __DIR__ . '/getEducationalFormHoursStructureForTheme.php';

use App\Models\WPDetailsModel;
use App\Models\PDFSemesterModel;
use App\Models\PDFModuleModel;
use App\Models\PDFThemeWithLessonsModel;
use App\Models\WPInvolvedPersonModel;
use App\Models\SemesterEducationalFormModel;

function getFullFormattedWorkingProgramDataForPDF($workingProgramData)
{
	// Створюємо модель загальних даних для робочої програми
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
		$workingProgramData->controlMeasures,
		$workingProgramData->studingMethods,
		$workingProgramData->examingMethods
	);

	// Обробляємо семестри робочої програми та трансформуємо їх у модель
	$formattedSemesters = $workingProgramData->semesters->map(function ($semester) {
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
				&$lectionsForSemester,
				&$practicalsForSemester,
				&$seminarsForSemester,
				&$labsForSemester,
				&$selfworksForSemester,
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
				$lectionsForSemester = array_merge($lectionsForSemester, $lections);

				// Обробляємо практичні до теми та трансформуємо їх у модель
				$practicals = getLessonWithEducationalFormLessonHour($theme->practicals);
				$practicalsForModule = array_merge($practicalsForModule, $practicals);
				$practicalsForSemester = array_merge($practicalsForSemester, $practicals);

				// Обробляємо семінари до теми та трансформуємо їх у модель
				$seminars = getLessonWithEducationalFormLessonHour($theme->seminars);
				$seminarsForModule = array_merge($seminarsForModule, $seminars);
				$seminarsForSemester = array_merge($seminarsForSemester, $seminars);

				// Обробляємо лабораторні до теми та трансформуємо їх у модель
				$labs = getLessonWithEducationalFormLessonHour($theme->labs);
				$labsForModule = array_merge($labsForModule, $labs);
				$labsForSemester = array_merge($labsForSemester, $labs);

				// Обробляємо самостійні до теми та трансформуємо їх у модель
				$selfworks = getLessonWithEducationalFormLessonHour($theme->selfworks);
				$selfworksForModule = array_merge($selfworksForModule, $selfworks);
				$selfworksForSemester = array_merge($selfworksForSemester, $selfworks);


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
				$module->name ?? "",
				$module->moduleNumber,
				$themes,
				$totalEducationalFormHoursStructureForModule
			);
		})->toArray();

		// Рахуємо всі години різних занять для модуля
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

		return new PDFSemesterModel(
			$semester->id,
			$semester->semesterNumber,
			$semester->examType,
			$modules,
			$semester->courseWork,
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
			$totalEducationalFormHoursStructureForSemester
		);
	})->toArray();

	// Додаємо дані про семестри в робочу програму
	$workingProgram->semesters = $formattedSemesters;

	// Обробляємо дані про людину, яка створила робочу програму, та трансформуємо у модель
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

	// Додаємо дані про людину, яка створила робочу програму, в інформацію про робочу програму
	$workingProgram->createdByPersons = $formattedCreatedByPersons;

	return $workingProgram;
};
