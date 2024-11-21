<?php

require_once __DIR__ . '/getHoursSumByEducationalForm.php';

function getHoursSumForEducationalForms($lessons, $educationalForms)
{
	$hours = [];

	// Перебираємо всі форми навчання в семестрі
	foreach ($educationalForms as $form) {
		$colName = $form->colName;

		// Рахуємо суму годин по формі навчання
		$hours[$colName] = getHoursSumByEducationalForm($lessons, $colName);
	}

	return $hours;
};
