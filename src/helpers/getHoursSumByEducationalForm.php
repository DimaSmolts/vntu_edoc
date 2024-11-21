<?php

function getHoursSumByEducationalForm($lessons, $educationalFormName)
{
	// Додаємо всі години де форма навчання уроку (lessonFormName) відповідає формі навчання (educationalFormName)
	return array_reduce(
		$lessons,
		function ($carry, $lesson) use ($educationalFormName) {
			// Фільтруємо години навчальної форми уроку (educationalFormHours) до відповідної lessonFormName
			$filteredHours = array_filter(
				$lesson->educationalFormHours,
				fn($hours) => $hours->lessonFormName === $educationalFormName
			);

			// Сумуємо години
			$carry += array_sum(array_column($filteredHours, 'hours'));
			return $carry;
		},
		0
	);
};

