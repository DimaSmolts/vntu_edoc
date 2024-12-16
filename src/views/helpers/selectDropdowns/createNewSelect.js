const createNewSelect = (selectId) => {
	return new Choices(selectId, {
		searchEnabled: false,
		removeItemButton: true,
		itemSelectText: 'Обрати',
		shouldSort: true,
		sorter: (a, b) => {
			return a.value - b.value;
		},
		removeItemButton: true,
	});
}