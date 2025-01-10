const validateModulesAmount = ({
	value,
	semesterId,
	semesterNumber
}) => {
	const warningName = `modulesSem${semesterId}Empty`;

	if (value.length === 0) {
		removeWarning({
			group: 'programValidationGroup',
			name: warningName
		});
		
		const warning = {
			group: 'programValidationGroup',
			name: warningName,
			message: `⚠️ Додайте принаймні один модуль до семестру ${semesterNumber ? semesterNumber : ''}`,
			slideNumber: getSlideNumberByName('semesterProgram')
		}

		addWarning(warning);

		return false;
	} else {
		removeWarning({
			group: 'programValidationGroup',
			name: warningName
		});

		return true;
	}
}
