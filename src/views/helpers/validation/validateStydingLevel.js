const validateStydingLevel = ({
	element = null,
	value
}) => {
	const warningName = `stydingLevelEmpty`;

	if (!value) {
		const warning = {
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			message: `⚠️ Оберіть рівень вищої освіти`,
			slideNumber: getSlideNumberByName('generalInfo'),
			isParentElementHighlight: false,
			labelId: 'stydingLevelDropdownLabel'
		}

		addWarning(warning);
	} else {
		removeWarning({
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			isParentElementHighlight: false,
			labelId: 'stydingLevelDropdownLabel'
		});
	}
}
