const validateDepartment = ({
	element = null,
	value
}) => {
	const warningName = `departmentEmpty`;

	if (!value) {
		const warning = {
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			message: `⚠️ Оберіть кафедру`,
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
