<?php

function getIsTypeOfWorkExistsInWP($semesters, $typeOfWork)
{
	$isTypeOfWorkExists = false;

	if (!empty($semesters)) {
		foreach ($semesters as $semester) {
			if ($semester->{$typeOfWork}) {
				$isTypeOfWorkExists = true;
			}
		}
	}

	return $isTypeOfWorkExists;
};
