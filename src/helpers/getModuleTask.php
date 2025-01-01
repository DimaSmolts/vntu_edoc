<?php

require_once __DIR__ . '/getTaskId.php';

function getModuleTask($module)
{
	$tasksIds = getTaskId();

	if (!empty($module->tasks)) {
		$filteredTasks = $module->tasks->filter(function ($task) use (&$tasksIds) {
			return isset($task->taskType) && (
				$task->taskType->id === $tasksIds->colloquium ||
				$task->taskType->id === $tasksIds->controlWork
			);
		});

		return $filteredTasks->first() ?? null;
	}
};
