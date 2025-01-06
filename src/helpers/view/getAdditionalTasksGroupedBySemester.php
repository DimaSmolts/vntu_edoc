<?php

function getAdditionalTasksGroupedBySemester($pointsDistributionRelatedData)
{
	$additionalTasks = [];

	foreach ($pointsDistributionRelatedData->semesters as $semester) {
		foreach ($semester->additionalTasks as $additionalTask) {
			$taskTypeName = $additionalTask->taskTypeName;
			if (!isset($additionalTasks[$taskTypeName])) {
				$additionalTasks[$taskTypeName] = [];
			}
			$additionalTasks[$taskTypeName][] = $additionalTask;
		}
	}

	return $additionalTasks;
}
