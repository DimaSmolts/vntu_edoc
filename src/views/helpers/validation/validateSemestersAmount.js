const validateSemestersAmount = ({
	value
}) => {
	const warningName = `semestersEmpty`;

	if (value.length === 0) {
		const warning = {
			group: 'programValidationGroup',
			name: warningName,
			message: `⚠️ Додайте принаймні один семестер`,
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
