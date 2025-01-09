const renderGeneralInfoValidationWarnings = (validationEntries) => {
	const titleBlock = document.getElementById('generalInfoValidationTitleBlock');
	const validationGroupBlock = document.getElementById('generalInfoValidationGroup');

	renderTopicValidationWarnings({
		validationEntries,
		titleBlock,
		validationGroupBlock
	})
}
