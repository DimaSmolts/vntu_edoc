<?php

function getIsCourseworkExistsInWP($semesters)
{
	$isCourseworkExists = false;

	if (!empty($semesters)) {
		foreach ($semesters as $semester) {
			if ($semester->isCourseworkExists) {
				$isCourseworkExists = true;
			}
		}
	}

	return $isCourseworkExists;
};
