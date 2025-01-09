const validateDisciplineName = ({
	element = null,
	value
}) => {
	const warningName = `disciplineNameEmpty`;

	if (!value) {
		const warning = {
			targetElement: element,
			group: 'generalInfoValidationGroup',
			name: warningName,
			message: `⚠️ Введіть назву дисципліни (вона ж буде назвою робочої програми)`,
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
