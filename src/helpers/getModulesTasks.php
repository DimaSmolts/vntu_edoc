<?php

require_once __DIR__ . '/getTaskId.php';
require_once __DIR__ . '/../models/TaskModel.php';
require_once __DIR__ . '/../models/EducationalFormTaskHourModel.php';

use App\Models\TaskModel;
use App\Models\EducationalFormTaskHourModel;

function getModulesTasks($module, $semester)
{
	$tasksIds = getTaskId();

	if (!empty($module->tasks)) {
		$filteredTasks = $module->tasks->filter(function ($task) use (&$tasksIds) {
			return isset($task->taskType) && (
				$task->taskType->id === $tasksIds->colloquium ||
				$task->taskType->id === $tasksIds->controlWork
			);
		});

		$formattedTasks = $filteredTasks->map(function ($task) use (&$semester) {
			$educationalFormModuleTaskHours = isset($task->educationalFormTaskHours)
				? $task->educationalFormTaskHours->map(function ($moduleTaskHours) {
					return new EducationalFormTaskHourModel(
						$moduleTaskHours->semesterEducationalForm->id,
						$moduleTaskHours->semesterEducationalForm->educationalForm->name,
						$moduleTaskHours->hours
					);
				})->toArray()
				: [];

			return isset($task) ?
				new TaskModel(
					$semester->id,
					$task->taskTypeId,
					$task->id,
					$task->taskType->name,
					$educationalFormModuleTaskHours,
					$task->points ?? null,
				) : null;
		})->toArray();

		return $formattedTasks ?? null;
	}
};
