const renderSelfworkValidationWarnings = (validationEntries) => {
	const titleBlock = document.getElementById('selfworkValidationTitleBlock');
	const validationGroupBlock = document.getElementById('selfworkValidationGroup');

	renderTopicValidationWarnings({
		validationEntries,
		titleBlock,
		validationGroupBlock
	})
}
