const validateEducationalProgram = ({
	element = null,
	value
}) => {
	const warningName = `educationalProgramEmpty`;

	if (value.length === 0) {
		const warning = {
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			message: `⚠️ Оберіть принаймні одну освітню програму`,
			slideNumber: getSlideNumberByName('generalInfo')
		}

		addWarning(warning);
	} else {
		removeWarning({
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName
		});
	}
}
