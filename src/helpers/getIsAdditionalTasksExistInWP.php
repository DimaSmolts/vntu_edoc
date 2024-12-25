<?php

function getIsAdditionalTasksExistInWP($semesters)
{
	$isAdditionalTasksExist = false;

	if (!empty($semesters)) {
		foreach ($semesters as $semester) {
			if (isset($semester->additionalTasks)) {
				$isAdditionalTasksExist = true;
			}
		}
	}

	return $isAdditionalTasksExist;
};
