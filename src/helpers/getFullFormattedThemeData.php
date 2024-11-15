<?php

require_once __DIR__ . '/getEducationalFormName.php';
require_once __DIR__ . '/getLessonTypesNames.php';
require_once __DIR__ . '/../models/ThemeWithLessonsModel.php';
require_once __DIR__ . '/../models/LessonThemeModel.php';

use App\Models\ThemeWithLessonsModel;
use App\Models\LessonThemeModel;

function getFullFormattedThemeData($formattedThemeDataData)
{
	$formattedThemeData = [];

	foreach ($formattedThemeDataData as $themeData) {
		// Перевірка, чи вже існує тема в масиві formattedThemeData
		if (!isset($formattedThemeData[$themeData['id']])) {
			$formattedThemeData[$themeData['id']] = new ThemeWithLessonsModel(
				$themeData['id'],
				$themeData['name'],
				$themeData['themeNumber']
			);
		}

		$educationalForms = getEducationalFormName();
		$lessonTypes = getLessonTypesNames();

		// Підготовка даних для уроку
		$lessonData = new LessonThemeModel(
			$themeData['lessonThemeId'],
			$themeData['lessonTypeId'],
			$themeData['lessonTypeName'],
			$themeData['lessonThemeName'],
			$themeData['lessonThemeNumber'],
			$themeData['educationalFormName'] === $educationalForms->fullTime ? $themeData['hours'] : null,
			$themeData['educationalFormName'] === $educationalForms->correspondence ? $themeData['hours'] : null
		);

		// Додаємо до відповідного списку
		if ($themeData['lessonTypeName'] == $lessonTypes->lection) { // lections
			$formattedThemeData[$themeData['id']]->lections[] = $lessonData;
		} elseif ($themeData['lessonTypeName'] == $lessonTypes->practical) { // practicals
			$formattedThemeData[$themeData['id']]->practicals[] = $lessonData;
		} elseif ($themeData['lessonTypeName'] == $lessonTypes->seminar) { // seminars
			$formattedThemeData[$themeData['id']]->seminars[] = $lessonData;
		} elseif ($themeData['lessonTypeName'] == $lessonTypes->laboratory) { // labs
			$formattedThemeData[$themeData['id']]->labs[] = $lessonData;
		} elseif ($themeData['lessonTypeName'] == $lessonTypes->selfwork) { // selfworks
			$formattedThemeData[$themeData['id']]->selfworks[] = $lessonData;
		}
	}

	foreach ($formattedThemeData as $theme) {
		$theme->lections = mergeLessons($theme->lections);
		$theme->practicals = mergeLessons($theme->practicals);
		$theme->seminars = mergeLessons($theme->seminars);
		$theme->labs = mergeLessons($theme->labs);
		$theme->selfworks = mergeLessons($theme->selfworks);
	}

	return array_values($formattedThemeData);
}

// З'єднання занять за lessonThemeId
function mergeLessons($lessons)
{
	$mergedLessons = [];

	foreach ($lessons as $lesson) {
		$lessonThemeId = $lesson->lessonThemeId;

		if (!isset($mergedLessons[$lessonThemeId])) {
			$mergedLessons[$lessonThemeId] = new LessonThemeModel(
				$lesson->lessonThemeId,
				$lesson->lessonTypeId,
				$lesson->lessonTypeName,
				$lesson->lessonThemeName,
				$lesson->lessonThemeNumber
			);
		}

		// Merge `fullTime` and `correspondence` hours
		if ($lesson->fullTime !== null) {
			$mergedLessons[$lessonThemeId]->fullTime = $lesson->fullTime;
		}
		if ($lesson->correspondence !== null) {
			$mergedLessons[$lessonThemeId]->correspondence = $lesson->correspondence;
		}
	}

	return array_values($mergedLessons);
}
