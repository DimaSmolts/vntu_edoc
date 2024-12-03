const createSlide = (page, id) => {
	return createElement({
		elementName: 'li',
		classList: ['slide'],
		innerHTML: page,
		id
	})
}