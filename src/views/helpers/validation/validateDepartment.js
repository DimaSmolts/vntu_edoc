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
			slideNumber: getSlideNumberByName('generalInfo'),
			isParentElementHighlight: false,
			labelId: 'departmentDropdownLabel'
		}

		addWarning(warning);
	} else {
		removeWarning({
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			isParentElementHighlight: false,
			labelId: 'departmentDropdownLabel'
		});
	}
}
