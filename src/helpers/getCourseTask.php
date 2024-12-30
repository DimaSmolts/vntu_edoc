<?php

require_once __DIR__ . '/getTaskId.php';

function getCourseTask($semester)
{
	$tasksIds = getTaskId();

	if (!empty($semester->tasks)) {
		$filteredTasks = $semester->tasks->filter(function ($task) use (&$tasksIds) {
			return isset($task->taskType) && (
				$task->taskType->id === $tasksIds->coursework ||
				$task->taskType->id === $tasksIds->courseProject
			);
		});

		return $filteredTasks->first() ?? null;
	}
};
