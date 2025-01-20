const validateSpecialties = ({
	element = null,
	value
}) => {
	const warningName = `specialtiesEmpty`;

	if (value.length === 0) {
		const warning = {
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			message: `⚠️ Оберіть принаймні одну спеціальність`,
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
