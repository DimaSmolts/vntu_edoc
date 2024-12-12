const initializeTextEditor = (inputElementId) => {
	// Ініціалізуємо редактор тексту
	return new Quill(inputElementId, {
		theme: 'snow',
		modules: {
			toolbar: [
				['bold', 'italic', 'underline'], // додаємо можливості для зміни тексту
				[{
					'list': 'ordered'
				}, {
					'list': 'bullet'
				}], // додаємо можливості для зміни списків
				['link'] // // додаємо можливість роботи з посиланнями
			]
		}
	});
} 