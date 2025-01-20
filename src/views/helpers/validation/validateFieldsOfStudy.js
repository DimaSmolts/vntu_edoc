const validateFieldsOfStudy = ({
	element = null,
	value
}) => {
	const warningName = `fieldsOfStudyEmpty`;

	if (value.length === 0) {
		const warning = {
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			message: `⚠️ Оберіть принаймні одну галузь знань`,
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
