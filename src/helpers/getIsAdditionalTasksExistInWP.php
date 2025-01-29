<?php

function getIsAdditionalTasksExistInWP($semesters)
{
	$isAdditionalTasksExist = false;

	if (!empty($semesters)) {
		foreach ($semesters as $semester) {
			if (count($semester->additionalTasks) > 0) {
				$isAdditionalTasksExist = true;
			}
		}
	}

	return $isAdditionalTasksExist;
};
