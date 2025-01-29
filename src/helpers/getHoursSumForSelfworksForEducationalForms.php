<?php

function getHoursSumForSelfworksForEducationalForms($semesterSelfworkData, $educationalForms)
{
	$totalHours = [];

	// Перебираємо всі форми навчання в семестрі
	foreach ($educationalForms as $form) {
		$total = 0;
		$colName = $form->colName;

		// Додаємо години для самостійного опрацювання тем теоретичного матеріалу
		if (!empty($semesterSelfworkData->selfworks)) {
			foreach ($semesterSelfworkData->selfworks as $selfwork) {
				if (!empty($selfwork->educationalFormHours)) {
					foreach ($selfwork->educationalFormHours as $educationalFormHour) {
						if ($educationalFormHour->lessonFormName === $colName) {
							$hours = $educationalFormHour->hours;
							$total += $hours;
						}
					}
				}
			}
		}

		// Додаємо години для опрацювання лекційного матеріалу
		if (isset($semesterSelfworkData->lectionSelfworkTask->educationalFormHours)) {
			foreach ($semesterSelfworkData->lectionSelfworkTask->educationalFormHours as $educationalFormHour) {
				if ($educationalFormHour->educationalFormName === $colName) {
					$hours = $educationalFormHour->hours;
					$total += $hours;
				}
			}
		}

		// Додаємо години для підготовки до лабораторних занять
		if (isset($semesterSelfworkData->labSelfworkTask->educationalFormHours)) {
			foreach ($semesterSelfworkData->labSelfworkTask->educationalFormHours as $educationalFormHour) {
				if ($educationalFormHour->educationalFormName === $colName) {
					$hours = $educationalFormHour->hours;
					$total += $hours;
				}
			}
		}

		// Додаємо години для підготовки до практичних занять
		if (isset($semesterSelfworkData->practicalSelfworkTask->educationalFormHours)) {
			foreach ($semesterSelfworkData->practicalSelfworkTask->educationalFormHours as $educationalFormHour) {
				if ($educationalFormHour->educationalFormName === $colName) {
					$hours = $educationalFormHour->hours;
					$total += $hours;
				}
			}
		}

		// Додаємо години для підготовки до семінарських занять
		if (isset($semesterSelfworkData->seminarSelfworkTask->educationalFormHours)) {
			foreach ($semesterSelfworkData->seminarSelfworkTask->educationalFormHours as $educationalFormHour) {
				if ($educationalFormHour->educationalFormName === $colName) {
					$hours = $educationalFormHour->hours;
					$total += $hours;
				}
			}
		}

		// Додаємо години для написання рефератів / підготовка презентацій / творчих робіт / есеїв / іншого
		if (!empty($semesterSelfworkData->additionalTasks)) {
			foreach ($semesterSelfworkData->additionalTasks[0]->educationalFormHours as $educationalFormHour) {
				if ($educationalFormHour->educationalFormName === $colName) {
					$hours = $educationalFormHour->hours;
					$total += $hours;
				}
			}
		}

		// Додаємо години для виконання розрахунково-графічної роботи
		if ($semesterSelfworkData->isCalculationAndGraphicWorkExists) {
			foreach ($semesterSelfworkData->calculationAndGraphicTypeTask->educationalFormHours as $educationalFormHour) {
				if ($educationalFormHour->educationalFormName === $colName) {
					$hours = $educationalFormHour->hours;
					$total += $hours;
				}
			}
		}

		// Додаємо години для виконання розрахунково-графічного завдання
		if ($semesterSelfworkData->isCalculationAndGraphiTaskExists) {
			foreach ($semesterSelfworkData->calculationAndGraphicTypeTask->educationalFormHours as $educationalFormHour) {
				if ($educationalFormHour->educationalFormName === $colName) {
					$hours = $educationalFormHour->hours;
					$total += $hours;
				}
			}
		}

		// Додаємо години для виконання курсового проєкту
		if ($semesterSelfworkData->isCourseProjectExists) {
			$total += $semesterSelfworkData->courseTask->educationalFormHours[0]->hours;
		}

		// Додаємо години для виконання курсової роботи
		if ($semesterSelfworkData->isCourseworkExists) {
			$total += $semesterSelfworkData->courseTask->educationalFormHours[0]->hours;
		}

		// Додаємо години для підготовки до модульного контролю
		if ($semesterSelfworkData->colloquiumAmount > 0 || $semesterSelfworkData->controlWorkAmount > 0) {
			foreach ($semesterSelfworkData->moduleTask->educationalFormHours as $educationalFormHour) {
				if ($educationalFormHour->educationalFormName === $colName) {
					$hours = $educationalFormHour->hours;
					$total += $hours;
				}
			}
		}

		// Додаємо години для підготовки до складання підсумкового контролю
		if ($semesterSelfworkData->examTypeId === 0) {
			$hours = $semesterSelfworkData->creditsAmount * 3;
		} else if ($semesterSelfworkData->examTypeId === 1 || $semesterSelfworkData->examTypeId === 2) {
			$hours = $semesterSelfworkData->creditsAmount;
		}
		$total += $hours;

		// Рахуємо суму годин по формі навчання
		$totalHours[$colName] = $total;
	}

	return $totalHours;
};
