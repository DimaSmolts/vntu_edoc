<?php

require_once __DIR__ . '/getEducationalFormName.php';

function getTotalHoursAmountInWp(
	$totalHoursForLections,
	$totalHoursForPracticals,
	$totalHoursForSeminars,
	$totalHoursForLabs,
	$totalHoursForSelfworks,
) {
	$totalHours = 0;

	$educationalFormName = getEducationalFormName();

	if (isset($totalHoursForLections[$educationalFormName->fullTime])) {
		$totalHours += $totalHoursForLections[$educationalFormName->fullTime];
		$totalHours += $totalHoursForPracticals[$educationalFormName->fullTime];
		$totalHours += $totalHoursForSeminars[$educationalFormName->fullTime];
		$totalHours += $totalHoursForLabs[$educationalFormName->fullTime];
		$totalHours += $totalHoursForSelfworks[$educationalFormName->fullTime];
	} else if (isset($totalHoursForLections[$educationalFormName->correspondence])) {
		$totalHours += $totalHoursForLections[$educationalFormName->correspondence];
		$totalHours += $totalHoursForPracticals[$educationalFormName->correspondence];
		$totalHours += $totalHoursForSeminars[$educationalFormName->correspondence];
		$totalHours += $totalHoursForLabs[$educationalFormName->correspondence];
		$totalHours += $totalHoursForSelfworks[$educationalFormName->correspondence];
	} else if (isset($totalHoursForLections[$educationalFormName->dual])) {
		$totalHours += $totalHoursForLections[$educationalFormName->dual];
		$totalHours += $totalHoursForPracticals[$educationalFormName->dual];
		$totalHours += $totalHoursForSeminars[$educationalFormName->dual];
		$totalHours += $totalHoursForLabs[$educationalFormName->dual];
		$totalHours += $totalHoursForSelfworks[$educationalFormName->dual];
	}

	return $totalHours;
};
