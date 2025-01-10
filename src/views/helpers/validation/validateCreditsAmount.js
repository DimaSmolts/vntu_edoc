const validateCreditsAmount = ({
	element = null,
	value
}) => {
	const warningName = `creditsAmountEmpty`;

	if (!value) {
		const warning = {
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			message: `⚠️ Введіть кількість кредитів (не менше ніж 1)`,
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
