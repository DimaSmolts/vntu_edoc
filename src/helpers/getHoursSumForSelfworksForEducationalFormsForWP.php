<?php

function getHoursSumForSelfworksForEducationalFormsForWP($totalHoursForSelfworksBySemesters)
{
	$totalHours = [];

	// Перебираємо всі семестри
	foreach ($totalHoursForSelfworksBySemesters as $totalHoursForSelfworks) {
		foreach ($totalHoursForSelfworks as $form => $hours) {
			if (isset($totalHours[$form])) {
				$totalHours[$form] += $hours;
			} else {
				$totalHours[$form] = $hours;
			}
		}
	}

	return $totalHours;
};
