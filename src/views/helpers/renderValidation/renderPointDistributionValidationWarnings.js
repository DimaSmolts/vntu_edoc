const renderPointDistributionValidationWarnings = (validationEntries) => {
	const titleBlock = document.getElementById('pointDistributionValidationTitleBlock');
	const validationGroupBlock = document.getElementById('pointDistributionValidationGroup');

	renderTopicValidationWarnings({
		validationEntries,
		titleBlock,
		validationGroupBlock
	})
}
