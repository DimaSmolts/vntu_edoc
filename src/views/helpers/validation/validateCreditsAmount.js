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
			message: `⚠️ Введіть кількість кредитів`,
			slideNumber: getSlideNumberByName('generalInfo'),
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
