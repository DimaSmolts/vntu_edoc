const renderAssesmentComponentValidationWarnings = (validationEntries) => {
	const titleBlock = document.getElementById('assesmentComponentValidationTitleBlock');
	const validationGroupBlock = document.getElementById('assesmentComponentValidationGroup');

	renderTopicValidationWarnings({
		validationEntries,
		titleBlock,
		validationGroupBlock
	})
}
