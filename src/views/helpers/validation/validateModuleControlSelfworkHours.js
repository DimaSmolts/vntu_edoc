const validateModuleControlSelfworkHours = ({
	element = null,
	value,
	educationalFormId,
	semesterId,
	semesterNumber,
	moduleControlAmount
}) => {
	const minValueWarningName = `moduleControlEFId${educationalFormId}Sem${semesterId}MinValue`
	const maxValueWarningName = `moduleControlEFId${educationalFormId}Sem${semesterId}MaxValue`

	const minValue = moduleControlAmount * 2;
	const maxValue = moduleControlAmount * 5;

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
			message: `⚠️ Кількість годин для підготовки до модульного контролю (${getEducationFormNameById(educationalFormId)} форма, ${semesterNumber} сем.) НИЖЧА ніж необхідно (мін. значення - ${minValue})`,
			slideNumber: getSlideNumberByName('selfworkContent')
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
			message: `⚠️ Кількість годин для підготовки до модульного контролю (${getEducationFormNameById(educationalFormId)} форма, ${semesterNumber} сем.) ВИЩА ніж необхідно (макс. значення - ${maxValue})`,
			slideNumber: getSlideNumberByName('selfworkContent')
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
