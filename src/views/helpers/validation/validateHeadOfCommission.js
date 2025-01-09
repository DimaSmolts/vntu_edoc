const validateHeadOfCommission = ({
	element = null,
	value
}) => {
	const warningName = `headOfCommissionEmpty`;

	if (!value) {
		const warning = {
			targetElement: element,
			group: 'approvedInfoValidationGroup',
			name: warningName,
			message: `⚠️ Оберіть голову ради/комісії, яка схвалила робочу програму`,
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
