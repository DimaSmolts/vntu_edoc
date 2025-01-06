<?php

function getIsAdditionalTasksExistInWP($semesters)
{
	$isAdditionalTasksExist = false;

	if (!empty($semesters)) {
		foreach ($semesters as $semester) {
			if (!empty($semester->additionalTasks)) {
				$isAdditionalTasksExist = true;
			}
		}
	}

	return $isAdditionalTasksExist;
};
