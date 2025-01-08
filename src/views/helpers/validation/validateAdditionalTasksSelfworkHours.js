const validateAdditionalTasksSelfworkHours = ({
	element = null,
	value,
	educationalFormId,
	semesterId,
	semesterNumber,
	tasksAmount
}) => {
	const minValueWarningName = `additionalTaskEFId${educationalFormId}Sem${semesterId}MinValue`
	const maxValueWarningName = `additionalTaskEFId${educationalFormId}Sem${semesterId}MaxValue`

	const minValue = tasksAmount * 5;
	const maxValue = tasksAmount * 10;

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
			message: `⚠️ Кількість годин для написання рефератів / підготовка презентацій / творчих робіт / есеїв / іншого (${getEducationFormNameById(educationalFormId)} форма, ${semesterNumber} сем.) НИЖЧА ніж необхідно (мін. значення - ${minValue})`
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
			message: `⚠️ Кількість годин для написання рефератів / підготовка презентацій / творчих робіт / есеїв / іншого (${getEducationFormNameById(educationalFormId)} форма, ${semesterNumber} сем.) ВИЩА ніж необхідно (макс. значення - ${maxValue})`
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
