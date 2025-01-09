const validateEducationalProgramGuarantor = ({
	element = null,
	value
}) => {
	const warningName = `educationalProgramGuarantorEmpty`;

	if (!value) {
		const warning = {
			targetElement: element,
			group: 'approvedInfoValidationGroup',
			name: warningName,
			message: `⚠️ Оберіть гаранта освітньої програми`,
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
