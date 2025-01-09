const validateCreatedByPersons = ({
	element = null,
	value
}) => {
	const warningName = `createdByPersonsEmpty`;

	if (!value || value.length === 0) {
		const warning = {
			targetElement: element,
			group: 'approvedInfoValidationGroup',
			name: warningName,
			message: `⚠️ Оберіть особу/осіб, хто розробив робочу програму`,
			slideNumber: getSlideNumberByName('approvedInfo')
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
