const renderValidationWarnings = () => {
	const validationEntries = Array.from(validationMap);

	const invalidTitleBlock = document.getElementById('invalidTitleBlock');
	const validTitleBlock = document.getElementById('validTitleBlock');

	if (validationEntries?.length > 0) {
		validTitleBlock.style.display = 'none';
		invalidTitleBlock.style.display = 'block';
	} else {
		invalidTitleBlock.style.display = 'none';
		validTitleBlock.style.display = 'block';
	}

	const groupedValidationEntries = groupValidationEntries(validationEntries);

	renderSelfworkValidationWarnings(groupedValidationEntries['selfworkValidationGroup']);
	renderPointDistributionValidationWarnings(groupedValidationEntries['pointDistributionValidationGroup']);
	renderAssesmentComponentValidationWarnings(groupedValidationEntries['assesmentComponentValidationGroup']);
}