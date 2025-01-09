const validateDocApprovedBy = ({
	element = null,
	value
}) => {
	const warningName = `docApprovedByEmpty`;

	if (!value) {
		const warning = {
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			message: `⚠️ Оберіть особу, яка затверджує документ`,
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
