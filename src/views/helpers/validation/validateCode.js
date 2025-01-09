const validateCode = ({
	element = null,
	value
}) => {
	const warningName = `codeEmpty`;

	if (!value) {
		const warning = {
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			message: `⚠️ Введіть код`,
			slideNumber: getSlideNumberByName('generalInfo'),
			isParentElementHighlight: false
		}

		addWarning(warning);
	} else {
		removeWarning({
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			isParentElementHighlight: false
		});
	}
}
