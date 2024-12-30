<?php
function getAdditionalTasksTypeIds($semester)
{
	$additionalTasks = [];

	if (isset($semester->additionalTasks)) {
		foreach ($semester->additionalTasks as $additionalTask) {
			$additionalTasks[] = $additionalTask->taskTypeId;
		}
	}

	return $additionalTasks;
}
