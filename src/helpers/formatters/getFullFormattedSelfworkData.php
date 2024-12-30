<?php

require_once __DIR__ . '/../../models/SelfworkModel.php';
require_once __DIR__ . '/../../models/SemesterEducationalFormModel.php';
require_once __DIR__ . '/getLessonWithEducationalFormLessonHour.php';
require_once __DIR__ . '/../getHoursSumForEducationalForms.php';

use App\Models\SemesterEducationalFormModel;
use App\Models\SelfworkModel;

function getFullFormattedSelfworkData($workingProgramData)
{
	// Обробляємо семестри робочої програми
	return $workingProgramData->semesters->map(function ($semester) use (&$workingProgramData) {
		$lectionsWithEducationalFormLessonHour = [];
		$practicalsAmount = 0;
		$seminarsAmount = 0;
		$labsAmount = 0;
		$semesterEducationalForms = [];
		$colloquiumAmount = 0;
		$controlWorkAmount = 0;

		// Обробляємо всі обрані форми навчання для даного семестру та трансформуємо їх у модель
		$semesterEducationalForms[] = $semester->educationalForms->map(function ($educationalForm) {
			return new SemesterEducationalFormModel(
				$educationalForm->id,
				$educationalForm->educationalDisciplineSemesterId,
				$educationalForm->educationalFormId,
				$educationalForm->educationalForm->name,
				getEducationalFormVisualName($educationalForm->educationalForm->name)
			);
		})->toArray();

		// Обробляємо модулі семестра
		$semester->modules->map(function ($module) use (
			&$lectionsWithEducationalFormLessonHour,
			&$practicalsAmount,
			&$seminarsAmount,
			&$labsAmount,
			&$colloquiumAmount,
			&$controlWorkAmount,
		) {
			// Збираємо кількість колоквіумів та контрольних робіт
			if ($module->isColloquiumExists) {
				$colloquiumAmount += 1;
			}

			if ($module->isControlWorkExists) {
				$controlWorkAmount += 1;
			}

			// Обробляємо теми модуля
			$module->themes->map(function ($theme) use (
				&$lectionsWithEducationalFormLessonHour,
				&$practicalsAmount,
				&$seminarsAmount,
				&$labsAmount,
			) {
				$lection = getLessonWithEducationalFormLessonHour($theme->lections);
				$lectionsWithEducationalFormLessonHour = array_merge($lectionsWithEducationalFormLessonHour, $lection);

				$practicalsAmount += count($theme->practicals);
				$seminarsAmount += count($theme->seminars);
				$labsAmount += count($theme->labs);
			});
		});

		// Поєднуємо всі навчальні форми в один масив
		$mergedSemesterEducationalForms = array_merge(...$semesterEducationalForms);

		// Видаляємо дублікати
		$uniqueSemesterEducationalForms = array_values(array_reduce(
			$mergedSemesterEducationalForms,
			function ($carry, $item) {
				$carry[$item->educationalFormId] = $item;
				return $carry;
			},
			[]
		));

		// Рахуємо всі години лекцій для різних форм навчання
		$totalHoursForLections = getHoursSumForEducationalForms($lectionsWithEducationalFormLessonHour, $uniqueSemesterEducationalForms);

		return new SelfworkModel(
			$semester->id,
			$totalHoursForLections,
			$practicalsAmount,
			$seminarsAmount,
			$labsAmount,
			$uniqueSemesterEducationalForms,
			$semester->isCourseworkExists,
			$semester->isCourseProjectExists,
			$semester->isCalculationAndGraphicWorkExists,
			$semester->isCalculationAndGraphicTaskExists,
			isset($semester->additionalTasks),
			json_decode($semester->additionalTasks ?? '[]', true),
			$colloquiumAmount,
			$controlWorkAmount,
			$semester->semesterNumber,
			isset($semester->examType) ? $semester->examType->id : null,
			isset($semester->examType) ? $semester->examType->e_name : '',
			$workingProgramData->creditsAmount,
		);
	})->toArray();
}
