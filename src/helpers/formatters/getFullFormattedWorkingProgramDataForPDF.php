<?php

require_once __DIR__ . '/../../models/WPDetailsModel.php';
require_once __DIR__ . '/../../models/PDFSemesterModel.php';
require_once __DIR__ . '/../../models/ModuleModel.php';
require_once __DIR__ . '/../../models/ThemeWithLessonsModel.php';
require_once __DIR__ . '/../../models/LessonThemeModel.php';
require_once __DIR__ . '/../../models/EducationalFormLessonHourModel.php';
require_once __DIR__ . '/../../models/WPInvolvedPersonModel.php';
require_once __DIR__ . '/../../models/SemesterEducationalFormModel.php';
require_once __DIR__ . '/../../helpers/getEducationalFormVisualName.php';

use App\Models\WPDetailsModel;
use App\Models\PDFSemesterModel;
use App\Models\ModuleModel;
use App\Models\ThemeWithLessonsModel;
use App\Models\LessonThemeModel;
use App\Models\EducationalFormLessonHourModel;
use App\Models\WPInvolvedPersonModel;
use App\Models\SemesterEducationalFormModel;

function getFullFormattedWorkingProgramDataForPDF($workingProgramData)
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
		$practicalsForSemester = [];

		$modules = $semester->modules->map(function ($module) use (&$practicalsForSemester) {
			$themes = $module->themes->map(function ($theme) use (&$practicalsForSemester) {
				$practicals = $theme->practicals->map(function ($lessonTheme) {
					$educationalFormHours = $lessonTheme->educationalFormLessonHours->map(function ($lessonHours) {
						return new EducationalFormLessonHourModel(
							$lessonHours->id,
							$lessonHours->educationalFormId,
							$lessonHours->lessonThemeId,
							$lessonHours->educationalForm->name,
							$lessonHours->hours
						);
					})->toArray();

					return new LessonThemeModel(
						$lessonTheme->id,
						$lessonTheme->lessonTypeId,
						$lessonTheme->name,
						$lessonTheme->lessonThemeNumber,
						$educationalFormHours
					);
				})->toArray();

				$practicalsForSemester = array_merge($practicalsForSemester, $practicals);

				return new ThemeWithLessonsModel(
					$theme->id,
					$theme->name ?? "",
					$theme->description ?? "",
					$theme->themeNumber,
					$theme->lections->map(function ($lessonTheme) {
						$educationalFormHours = $lessonTheme->educationalFormLessonHours->map(function ($lessonHours) {
							return new EducationalFormLessonHourModel(
								$lessonHours->id,
								$lessonHours->educationalFormId,
								$lessonHours->lessonThemeId,
								$lessonHours->educationalForm->name,
								$lessonHours->hours
							);
						})->toArray();

						return new LessonThemeModel(
							$lessonTheme->id,
							$lessonTheme->lessonTypeId,
							$lessonTheme->name,
							$lessonTheme->lessonThemeNumber,
							$educationalFormHours
						);
					})->toArray(),
					$practicals,
					$theme->seminars->map(function ($lessonTheme) {
						$educationalFormHours = $lessonTheme->educationalFormLessonHours->map(function ($lessonHours) {
							return new EducationalFormLessonHourModel(
								$lessonHours->id,
								$lessonHours->educationalFormId,
								$lessonHours->lessonThemeId,
								$lessonHours->educationalForm->name,
								$lessonHours->hours
							);
						})->toArray();

						return new LessonThemeModel(
							$lessonTheme->id,
							$lessonTheme->lessonTypeId,
							$lessonTheme->name,
							$lessonTheme->lessonThemeNumber,
							$educationalFormHours
						);
					})->toArray(),
					$theme->labs->map(function ($lessonTheme) {
						$educationalFormHours = $lessonTheme->educationalFormLessonHours->map(function ($lessonHours) {
							return new EducationalFormLessonHourModel(
								$lessonHours->id,
								$lessonHours->educationalFormId,
								$lessonHours->lessonThemeId,
								$lessonHours->educationalForm->name,
								$lessonHours->hours
							);
						})->toArray();

						return new LessonThemeModel(
							$lessonTheme->id,
							$lessonTheme->lessonTypeId,
							$lessonTheme->name,
							$lessonTheme->lessonThemeNumber,
							$educationalFormHours
						);
					})->toArray(),
					$theme->selfworks->map(function ($lessonTheme) {
						$educationalFormHours = $lessonTheme->educationalFormLessonHours->map(function ($lessonHours) {
							return new EducationalFormLessonHourModel(
								$lessonHours->id,
								$lessonHours->educationalFormId,
								$lessonHours->lessonThemeId,
								$lessonHours->educationalForm->name,
								$lessonHours->hours
							);
						})->toArray();

						return new LessonThemeModel(
							$lessonTheme->id,
							$lessonTheme->lessonTypeId,
							$lessonTheme->name,
							$lessonTheme->lessonThemeNumber,
							$educationalFormHours
						);
					})->toArray(),
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

		return new PDFSemesterModel(
			$semester->id,
			$semester->semesterNumber,
			$semester->examType,
			$modules,
			$semester->courseWork,
			$educationalForms,
			$practicalsForSemester
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
