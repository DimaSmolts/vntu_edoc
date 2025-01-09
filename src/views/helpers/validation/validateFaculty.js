const validateFaculty = ({
	element = null,
	value
}) => {
	const warningName = `facultyEmpty`;

	if (!value) {
		const warning = {
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			message: `⚠️ Оберіть факультет`,
			slideNumber: getSlideNumberByName('generalInfo'),
			isParentElementHighlight: false,
			labelId: 'facultyDropdownLabel'
		}

		addWarning(warning);
	} else {
		removeWarning({
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			isParentElementHighlight: false,
			labelId: 'facultyDropdownLabel'
		});
	}
}
