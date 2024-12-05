<?php

function getSemestersAndModulesIds($pointsDistributionRelatedData)
{
	$semestersAndModulesIds = [];

	$semesterIds = [];
	$modulesIdsInSemester = [];

	foreach ($pointsDistributionRelatedData->semesters as $semesterData) {
		$semesterIds[] = $semesterData->id;

		$modulesIds = [];
		foreach ($semesterData->modules as $moduleData) {
			$modulesIds[] = $moduleData->moduleId;
		}

		$modulesIdsInSemester[$semesterData->id] = $modulesIds;
	}

	$semestersAndModulesIds['semesterIds'] = $semesterIds;
	$semestersAndModulesIds['modulesIdsInSemester'] = $modulesIdsInSemester;

	return $semestersAndModulesIds;
}
