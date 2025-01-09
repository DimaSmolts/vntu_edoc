const groupValidationEntries = (validationEntries) => {
	return validationEntries.reduce((acc, [elementId, { group, message, slideNumber }]) => {
		if (!acc[group]) {
			acc[group] = [];
		}
		acc[group].push({ elementId, message, slideNumber });
		return acc;
	}, {});
}