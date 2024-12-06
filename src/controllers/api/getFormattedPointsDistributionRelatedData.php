<?php

require_once __DIR__ . '/../../models/PointsDistributionRelatedDataModel.php';
require_once __DIR__ . '/../../models/SemesterModel.php';
require_once __DIR__ . '/../../models/PointsDistributionRelatedModuleWithLessonsModel.php';
require_once __DIR__ . '/getLessonWithEducationalFormLessonHour.php';

use App\Models\PointsDistributionRelatedDataModel;
use App\Models\SemesterModel;
use App\Models\PointsDistributionRelatedModuleWithLessonsModel;

function getFormattedPointsDistributionRelatedData($workingProgramData)
{
	$pointsDistributionRelatedData = new PointsDistributionRelatedDataModel(
		$workingProgramData->id,
		$workingProgramData->pointsDistribution
	);

	$formattedSemesters = $workingProgramData->semesters->map(function ($semester) {
		$modules = $semester->modules->map(function ($module) {
			$practicals = [];
			$seminars = [];
			$labs = [];

			$module->themes->map(function ($theme) use (&$practicals, &$seminars, &$labs) {
				$themePracticals = getLessonWithEducationalFormLessonHour($theme->practicals);
				$practicals = array_merge($practicals, $themePracticals);
				
				$themeSeminars = getLessonWithEducationalFormLessonHour($theme->seminars);
				$seminars = array_merge($seminars, $themeSeminars);
				
				$themeLabs = getLessonWithEducationalFormLessonHour($theme->labs);
				$labs = array_merge($labs, $themeLabs);
			});

			return new PointsDistributionRelatedModuleWithLessonsModel(
				$module->id,
				count($practicals),
				count($seminars),
				count($labs),
				$module->isColloquiumExists,
				$module->moduleNumber,
				$module->colloquiumPoints
			);
		})->toArray();

		return new SemesterModel(
			$semester->id,
			$semester->isCourseworkExists,
			$semester->semesterNumber,
			$semester->examType,
			$modules
		);
	})->toArray();

	$pointsDistributionRelatedData->semesters = $formattedSemesters;

	return $pointsDistributionRelatedData;
}
