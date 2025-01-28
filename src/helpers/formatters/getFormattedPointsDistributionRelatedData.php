<?php

require_once __DIR__ . '/../../models/PointsDistributionRelatedDataModel.php';
require_once __DIR__ . '/../../models/SemesterModel.php';
require_once __DIR__ . '/../../models/PointsDistributionRelatedModuleWithLessonsModel.php';
require_once __DIR__ . '/getLessonWithEducationalFormLessonHour.php';
require_once __DIR__ . '/../getTaskId.php';
require_once __DIR__ . '/../getIsTypeOfWorkExists.php';

use App\Models\PointsDistributionRelatedDataModel;
use App\Models\SemesterModel;
use App\Models\PointsDistributionRelatedModuleWithLessonsModel;
use App\Models\TaskModel;

function getFormattedPointsDistributionRelatedData($workingProgramData)
{
	$tasksIds = getTaskId();

	$pointsDistributionRelatedData = new PointsDistributionRelatedDataModel(
		$workingProgramData->id
	);

	$formattedSemesters = $workingProgramData->semesters->map(function ($semester) use (&$tasksIds) {
		$modules = $semester->modules->map(function ($module) use (&$tasksIds) {
			$practicals = getLessonWithEducationalFormLessonHour($module->practicals);
			$seminars = getLessonWithEducationalFormLessonHour($module->seminars);
			$labs = getLessonWithEducationalFormLessonHour($module->labs);

			return new PointsDistributionRelatedModuleWithLessonsModel(
				$module->id,
				count($practicals),
				count($seminars),
				count($labs),
				getIsTypeOfWorkExistsInModule($module, $tasksIds->colloquium),
				getIsTypeOfWorkExistsInModule($module, $tasksIds->controlWork),
				$module->moduleNumber,
				$module->colloquium->points ?? 0,
				$module->controlWork->points ?? 0
			);
		})->toArray();

		$calculationAndGraphicTypeTask = isset($semester->calculationAndGraphicTypeTask)
			? new TaskModel(
				$semester->id,
				$semester->calculationAndGraphicTypeTask->taskTypeId,
				$semester->calculationAndGraphicTypeTask->id,
				$semester->calculationAndGraphicTypeTask->taskType->name,
				[],
				$semester->calculationAndGraphicTypeTask->points
			)
			: null;

		$additionalTasks = !empty($semester->additionalTasks)
			? $semester->additionalTasks->map(function ($additionalTask) use (&$semester) {
				return new TaskModel(
					$semester->id,
					$additionalTask->taskTypeId,
					$additionalTask->id,
					$additionalTask->taskType->name,
					[],
					$additionalTask->points
				);
			})->toArray()
			: [];

		return new SemesterModel(
			$semester->id,
			$semester->semesterNumber,
			$semester->examTypeId,
			$modules,
			[],
			$semester->pointsDistribution,
			$calculationAndGraphicTypeTask,
			$additionalTasks,
		);
	})->toArray();

	$pointsDistributionRelatedData->semesters = $formattedSemesters;

	return $pointsDistributionRelatedData;
}
