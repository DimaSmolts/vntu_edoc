const initializeTextEditorForLiterature = ({ mainLiterature, supportingLiterature, additionalLiterature, informationResources, wpId }) => {
	// Змінюємо інпут для введення основної літератури
	const mainLiteratureTextEditor = initializeTextEditor('#main-literature-editor-container');
	// Змінюємо інпут для введення допоміжної літератури
	const supportingLiteratureTextEditor = initializeTextEditor('#supporting-literature-editor-container');
	// Змінюємо інпут для введення додаткової літератури
	const additionalLiteratureTextEditor = initializeTextEditor('#additional-literature-editor-container');
	// Змінюємо інпут для введення інформаційні ресурсів
	const informationResourcesTextEditor = initializeTextEditor('#information-resources-editor-container');

	// Встановлюємо контент, який був збережений раніше
	mainLiteratureTextEditor.root.innerHTML = mainLiterature;
	supportingLiteratureTextEditor.root.innerHTML = supportingLiterature;
	additionalLiteratureTextEditor.root.innerHTML = additionalLiterature;
	informationResourcesTextEditor.root.innerHTML = informationResources;

	// Зберігаємо текст на кожне введення символу
	mainLiteratureTextEditor.on('text-change', function () {
		updateWPLiterature(wpId, 'main', mainLiteratureTextEditor.root.innerHTML);
	});
	// Зберігаємо текст на кожне введення символу
	supportingLiteratureTextEditor.on('text-change', function () {
		updateWPLiterature(wpId, 'supporting', supportingLiteratureTextEditor.root.innerHTML);
	});
	// Зберігаємо текст на кожне введення символу
	additionalLiteratureTextEditor.on('text-change', function () {
		updateWPLiterature(wpId, 'additional', additionalLiteratureTextEditor.root.innerHTML);
	});
	// Зберігаємо текст на кожне введення символу
	informationResourcesTextEditor.on('text-change', function () {
		updateWPLiterature(wpId, 'informationResources', informationResourcesTextEditor.root.innerHTML);
	});
} 