<?php

function getAllEducationalFormsAvailableInWorkingProgram($semesters)
{
	// Визначаємо початкову кількість навчальних форм
	$allEducationalFormsAvailableInWorkingProgram = [];

	if (!empty($semesters)) {

		// Перебираємо усі семестри
		foreach ($semesters as $semester) {

			// Якщо початкова кількість пуста, то копіюємо в неї форми навчання з семестру
			if (empty($allEducationalFormsAvailableInWorkingProgram)) {
				$allEducationalFormsAvailableInWorkingProgram = $semester->educationalForms;

				// Якщо ні, то порівнюємо кількість форм в поточному семестрі з уже записаними та обираємо більшу кількість 
			} else {
				if (count($semester->educationalForms) > count($allEducationalFormsAvailableInWorkingProgram)) {
					$allEducationalFormsAvailableInWorkingProgram = $semester->educationalForms;
				}
			}
		}
	}

	return $allEducationalFormsAvailableInWorkingProgram;
}
