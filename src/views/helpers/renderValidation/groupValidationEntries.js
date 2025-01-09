const groupValidationEntries = (validationEntries) => {
	return validationEntries.reduce((acc, [elementId, { group, message, slideNumber, targetElement }]) => {
		if (!acc[group]) {
			acc[group] = [];
		}
		acc[group].push({ elementId, message, slideNumber, targetElement });
		return acc;
	}, {});
}