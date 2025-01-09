const renderApprovedInfoValidationWarnings = (validationEntries) => {
	const titleBlock = document.getElementById('approvedInfoValidationTitleBlock');
	const validationGroupBlock = document.getElementById('approvedInfoValidationGroup');

	renderTopicValidationWarnings({
		validationEntries,
		titleBlock,
		validationGroupBlock
	})
}
