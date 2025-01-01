<?php

require_once __DIR__ . '/getTaskId.php';

function getCalculationAndGraphicTypeTask($semester)
{
	$tasksIds = getTaskId();

	if (!empty($semester->tasks)) {
		$filteredTasks = $semester->tasks->filter(function ($task) use (&$tasksIds) {
			return isset($task->taskType) && (
				$task->taskType->id === $tasksIds->calculationAndGraphicWork ||
				$task->taskType->id === $tasksIds->calculationAndGraphicTask
			);
		});

		return $filteredTasks->first() ?? null;
	}
};
