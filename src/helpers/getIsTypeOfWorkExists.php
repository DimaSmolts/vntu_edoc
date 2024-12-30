<?php

function getIsTypeOfWorkExistsInSemester($semester, $typeOfWorkId)
{
	$isTypeOfWorkExists = false;

	if (isset($semester)) {
		foreach ($semester->tasks as $task) {
			if ($task->taskTypeId === $typeOfWorkId) {
				$isTypeOfWorkExists = true;
			}
		}
	}

	return $isTypeOfWorkExists;
};

function getIsTypeOfWorkExistsInWP($semesters, $typeOfWorkId)
{
	$isTypeOfWorkExists = false;

	if (!empty($semesters)) {
		foreach ($semesters as $semester) {
			$isTypeOfWorkExistsInSemester = getIsTypeOfWorkExistsInSemester($semester, $typeOfWorkId);
			if ($isTypeOfWorkExistsInSemester) {
				return true;
			}
		}
	}

	return $isTypeOfWorkExists;
};

function getIsTypeOfWorkExistsInModule($module, $typeOfWorkId)
{
	$isTypeOfWorkExists = false;

	if (!empty($module->tasks)) {
		foreach ($module->tasks as $task) {
			if ($task->taskTypeId === $typeOfWorkId) {
				$isTypeOfWorkExists = true;
			}
		}
	}

	return $isTypeOfWorkExists;
};
