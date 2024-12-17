const initializeTextEditorWithoutToolbarWithListAndLink = (inputElementId) => {
	// Ініціалізуємо редактор тексту
	return new Quill(inputElementId, {
		theme: 'snow',
		modules: {
			toolbar: false // Disable the toolbar
		},
		formats: ['bold', 'italic', 'underline', 'link', 'list'],
	});
} 