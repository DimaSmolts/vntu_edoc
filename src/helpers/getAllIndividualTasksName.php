<?php

function getAllIndividualTasksName($details, $structure)
{
	$individualTasksNames = [];

	if ($structure->isCourseworkExists) {
		$individualTasksNames['Курсова робота'] = 'Курсова робота';
	}

	if ($structure->isCourseProjectExists) {
		$individualTasksNames['Курсовий проєкт'] = 'Курсовий проєкт';
	}

	if ($structure->isCalculationAndGraphicWorkExists) {
		$individualTasksNames['Розрахунково-графічна робота'] = 'Розрахунково-<br>графічна робота';
	}

	if ($structure->isCalculationAndGraphicTaskExists) {
		$individualTasksNames['Розрахунково-графічне завдання'] = 'Розрахунково-<br>графічне завдання';
	}

	if (!empty($details->semesters)) {
		foreach ($details->semesters as $semester) {
			if (!empty($semester->tasks)) {
				foreach ($semester->tasks as $task) {
					if (!empty($task->additionalTasks)) {
						foreach ($task->additionalTasks as $additionalTask) {
							$individualTasksNames[$additionalTask->taskType->name] = $additionalTask->taskType->name;
						}
					}
				}
			}
		}
	}

	if (!empty($individualTasksNames)) {
		return implode(', ', $individualTasksNames);
	} else {
		return null;
	}
}
