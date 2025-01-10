const validateThemesAmount = ({
	value,
	moduleId,
	moduleNumber,
	semesterNumber
}) => {
	const warningName = `themesSem${moduleId}Empty`;

	if (value.length === 0) {
		removeWarning({
			group: 'programValidationGroup',
			name: warningName
		});

		const warning = {
			group: 'programValidationGroup',
			name: warningName,
			message: `⚠️ Додайте принаймні одну тему лекцій до модуля ${moduleNumber ? moduleNumber : ''} ${semesterNumber ? `(${semesterNumber} сем.)` : ''}`,
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
