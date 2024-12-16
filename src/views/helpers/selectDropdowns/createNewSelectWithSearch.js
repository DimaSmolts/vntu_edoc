const createNewSelectWithSearch = (selectId) => {
	return new Choices(selectId, {
		searchEnabled: true,
		searchResultLimit: 10,
		shouldSort: false,
		removeItemButton: true,
		duplicateItemsAllowed: false,
		noChoicesText: 'Введіть 3 символи, щоб почати пошук',
		noResultsText: 'Нічого не знайдено',
		itemSelectText: 'Обрати',
	});
}