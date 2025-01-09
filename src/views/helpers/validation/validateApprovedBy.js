const validateApprovedBy = ({
	element = null,
	value
}) => {
	const warningName = `validateApprovedEmpty`;

	if (!value) {
		const warning = {
			targetElement: element,
			group: 'approvedInfoValidationGroup',
			name: warningName,
			message: `⚠️ Оберіть особу, яка затвердила робочу програму`,
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
