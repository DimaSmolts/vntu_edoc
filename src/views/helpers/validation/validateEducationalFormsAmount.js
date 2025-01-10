const validateEducationalFormsAmount = ({
	elements,
	value,
	semesterId,
	semesterNumber
}) => {
	const warningName = `educationalFormsSem${semesterId}Empty`;

	if (value.length === 0) {
		removeWarning({
			group: 'programControlMethodsValidationGroup',
			name: warningName
		});

		const warning = {
			targetElements: elements,
			group: 'programControlMethodsValidationGroup',
			name: warningName,
			message: `⚠️ Додайте принаймні одну форму здобуття освіти до семестру ${semesterNumber ? semesterNumber : ''}`,
			slideNumber: getSlideNumberByName('semesterProgram')
		}

		addWarning(warning);

		return false;
	} else {
		removeWarning({
			targetElements: elements,
			group: 'programControlMethodsValidationGroup',
			name: warningName
		});

		return true;
	}
}
