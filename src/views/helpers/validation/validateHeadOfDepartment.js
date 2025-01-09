const validateHeadOfDepartment = ({
	element = null,
	value
}) => {
	const warningName = `headOfDepartmentEmpty`;

	if (!value) {
		const warning = {
			targetElement: element,
			group: 'approvedInfoValidationGroup',
			name: warningName,
			message: `⚠️ Оберіть особу (до прикладу, зав. кафедри), яка схвалила робочу програму`,
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
