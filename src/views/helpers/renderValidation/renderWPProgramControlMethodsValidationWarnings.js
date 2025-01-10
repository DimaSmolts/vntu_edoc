const renderWPProgramControlMethodsValidationWarnings = (validationEntries) => {
	const titleBlock = document.getElementById('programControlMethodsValidationTitleBlock');
	const validationGroupBlock = document.getElementById('programControlMethodsValidationGroup');

	renderTopicValidationWarnings({
		validationEntries,
		titleBlock,
		validationGroupBlock
	})
}
