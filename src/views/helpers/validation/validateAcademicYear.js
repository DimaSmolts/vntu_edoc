const validateAcademicYear = ({
	element = null,
	value
}) => {
	const warningName = `academicYearEmpty`;

	if (!value) {
		const warning = {
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			message: `⚠️ Введіть рік підготовки (не менше ніж 1)`,
			slideNumber: getSlideNumberByName('generalInfo'),
			isParentElementHighlight: false
		}

		addWarning(warning);
	} else {
		removeWarning({
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			isParentElementHighlight: false
		});
	}
}
