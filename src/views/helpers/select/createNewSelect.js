const createNewSelect = (selectId) => {
	return new Choices(selectId, {
		searchEnabled: true,
		searchResultLimit: 10,
		shouldSort: false,
		removeItemButton: true,
	});
}