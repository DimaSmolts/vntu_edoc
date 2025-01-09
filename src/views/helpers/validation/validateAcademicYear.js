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
			message: `⚠️ Введіть рік підготовки`,
			slideNumber: getSlideNumberByName('generalInfo'),
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
