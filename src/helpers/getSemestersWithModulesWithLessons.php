<?php

function getSemestersWithModulesWithLessons($pointsDistributionRelatedData)
{
	$semestersWithModulesWithLessons = [];

	$semestersWithModulesWithPracticals = [];
	$semestersWithModulesWithLabs = [];
	$semestersWithModulesWithSeminars = [];

	if (!empty($pointsDistributionRelatedData->semesters)) {
		foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
			$modulesPracticalsInSemester = [];
			$modulesLabsInSemester = [];
			$modulesSeminarsInSemester = [];
			$totalPracticalLessons = 0;
			$totalLabLessons = 0;
			$totalSeminarLessons = 0;

			if (!empty($semesterData->modules)) {
				foreach ($semesterData->modules as $moduleData) {
					$modulesPracticalsInSemester[$moduleData->moduleId] = $moduleData->practicals;
					$totalPracticalLessons += $moduleData->practicals;

					$modulesLabsInSemester[$moduleData->moduleId] = $moduleData->labs;
					$totalLabLessons += $moduleData->labs;

					$modulesSeminarsInSemester[$moduleData->moduleId] = $moduleData->seminars;
					$totalSeminarLessons += $moduleData->seminars;
				}
			}
			$modulesPracticalsInSemester['totalLessons'] = $totalPracticalLessons;
			$modulesLabsInSemester['totalLessons'] = $totalLabLessons;
			$modulesSeminarsInSemester['totalLessons'] = $totalSeminarLessons;

			$semestersWithModulesWithPracticals[$semesterData->id] = $modulesPracticalsInSemester;
			$semestersWithModulesWithLabs[$semesterData->id] = $modulesLabsInSemester;
			$semestersWithModulesWithSeminars[$semesterData->id] = $modulesSeminarsInSemester;
		}
	}

	$semestersWithModulesWithLessons['semestersWithModulesWithPracticals'] = $semestersWithModulesWithPracticals;
	$semestersWithModulesWithLessons['semestersWithModulesWithLabs'] = $semestersWithModulesWithLabs;
	$semestersWithModulesWithLessons['semestersWithModulesWithSeminars'] = $semestersWithModulesWithSeminars;

	return $semestersWithModulesWithLessons;
}
