const groupValidationEntries = (validationEntries) => {
	return validationEntries.reduce((acc, [elementId, { group, message }]) => {
		if (!acc[group]) {
			acc[group] = [];
		}
		acc[group].push({ elementId, message });
		return acc;
	}, {});
}