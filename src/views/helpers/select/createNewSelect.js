const createNewSelect = (selectId) => {
	return new Choices(selectId, {
		searchEnabled: false,
		removeItemButton: true,
		itemSelectText: 'Обрати',
	});
}