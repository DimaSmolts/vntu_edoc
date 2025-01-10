const renderWPProgramValidationWarnings = (validationEntries) => {
	const titleBlock = document.getElementById('programValidationTitleBlock');
	const validationGroupBlock = document.getElementById('programValidationGroup');

	renderTopicValidationWarnings({
		validationEntries,
		titleBlock,
		validationGroupBlock
	})
}
