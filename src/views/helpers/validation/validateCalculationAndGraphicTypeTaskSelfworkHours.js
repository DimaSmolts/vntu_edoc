const validateCalculationAndGraphicTypeTaskSelfworkHours = ({
	element = null,
	value,
	educationalFormId,
	semesterId,
	semesterNumber
}) => {
	const minValueWarningName = `calculationAndGraphicTypeTaskEFId${educationalFormId}Sem${semesterId}MinValue`
	const maxValueWarningName = `calculationAndGraphicTypeTaskEFId${educationalFormId}Sem${semesterId}MaxValue`

	const minValue = 10;
	const maxValue = 15;

	if (value < minValue) {
		removeWarning({
			targetElement: element,
			group: 'selfworkValidationGroup',
			name: maxValueWarningName
		});

		const warning = {
			targetElement: element,
			group: 'selfworkValidationGroup',
			name: minValueWarningName,
			message: `⚠️ Кількість годин для виконання РГР/РГЗ (${getEducationFormNameById(educationalFormId)} форма, ${semesterNumber} сем.) НИЖЧА ніж необхідно (мін. значення - ${minValue})`
		}

		addWarning(warning);
	} else if (value > maxValue) {
		removeWarning({
			targetElement: element,
			group: 'selfworkValidationGroup',
			name: minValueWarningName
		})

		const warning = {
			targetElement: element,
			group: 'selfworkValidationGroup',
			name: maxValueWarningName,
			message: `⚠️ Кількість годин для виконання РГР/РГЗ (${getEducationFormNameById(educationalFormId)} форма, ${semesterNumber} сем.) ВИЩА ніж необхідно (макс. значення - ${maxValue})`
		}

		addWarning(warning);
	} else {
		removeWarning({
			targetElement: element,
			group: 'selfworkValidationGroup',
			name: minValueWarningName
		});

		removeWarning({
			targetElement: element,
			group: 'selfworkValidationGroup',
			name: maxValueWarningName
		});
	}
}
