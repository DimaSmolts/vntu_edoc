const validateSelfworkHours = ({
	element = null,
	value,
	educationalFormId,
	semesterId,
	semesterNumber
}) => {
	const warningName = `selfworkEFId${educationalFormId}Sem${semesterId}MinValue`

	const minValue = 1;

	if (value < minValue) {
		const warning = {
			targetElement: element,
			group: 'selfworkValidationGroup',
			name: warningName,
			message: `Кількість годин для cамостійного опрацювання тем теоретичного матеріалу (${getEducationFormNameById(educationalFormId)} форма, ${semesterNumber} сем.) НИЖЧА ніж необхідно (мін. значення - ${minValue})`
		}

		addWarning(warning)
	} else {
		removeWarning({
			targetElement: element,
			group: 'selfworkValidationGroup',
			name: warningName
		})
	}
}
