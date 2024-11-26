const createThemeBlock = (themeId) => {
	const themeBlock = createElement({ elementName: "div", id: `themeBlock${themeId}`, classList: ["mini-block", "theme-block"] });

	const titleContainer = createElement({ elementName: "div", classList: ["theme-title-container"] });

	const title = createElement({
		elementName: "p",
		id: `themeTitle${themeId}`,
		innerText: 'Тема',
		classList: ["mini-block-title", "theme-title"]
	});

	const deleteThemeBtn = createElement({
		elementName: "button",
		innerText: 'Видалити тему',
		classList: ["btn", "theme-btn"],
		eventListenerType: 'click',
		eventListener: (event) => {
			openApproveDeletingModal('тему', () => deleteTheme(event, themeId));
		}
	});

	titleContainer.appendChild(title);
	titleContainer.appendChild(deleteThemeBtn);

	const themeDataBlock = createElement({ elementName: "div", classList: ["theme-data-block"] });

	const themeNumberLabel = createLabelWithInput({
		labelText: 'Номер теми:',
		inputType: 'number',
		inputName: 'themeNumber',
		eventListener: (event) => {
			updateNumberInput(event, themeId, `themeTitle${themeId}`, 'Тема', updateThemeInfo);
		}
	});

	const themeNameLabel = createLabelWithInput({
		labelText: 'Назва:',
		inputType: 'text',
		inputName: 'name',
		eventListener: (event) => {
			event.preventDefault()
			updateThemeInfo(event, themeId);
		}
	});

	const themeDescriptionLabel = createLabelWithTextarea({
		labelText: 'Опис:',
		inputName: 'description',
		rows: 5,
		eventListener: (event) => {
			event.preventDefault()
			updateThemeInfo(event, themeId);
		}
	});

	themeDataBlock.appendChild(themeNumberLabel);
	themeDataBlock.appendChild(themeNameLabel);

	themeBlock.appendChild(titleContainer);
	themeBlock.appendChild(themeDataBlock);
	themeBlock.appendChild(themeDescriptionLabel);

	return themeBlock;
}