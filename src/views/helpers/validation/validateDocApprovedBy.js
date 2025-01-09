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
			slideNumber: getSlideNumberByName('generalInfo'),
			isParentElementHighlight: false,
			labelId: 'docApprovedByLabel'
		}

		addWarning(warning);
	} else {
		removeWarning({
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			isParentElementHighlight: false,
			labelId: 'docApprovedByLabel'
		});
	}
}
