const createModuleBlock = (moduleId) => {
	const moduleContainer = createElement({ elementName: "div", id: `moduleBlock${moduleId}`, classList: ["mini-block"] });

	const titleContainer = createElement({ elementName: "div", classList: ["module-title-container"] });

	const title = createElement({
		elementName: "p",
		id: `moduleTitle${moduleId}`,
		innerText: "Модуль",
		classList: ["mini-block-title", "module-title"]
	});

	const removeModuleBtn = createElement({
		elementName: "button",
		innerText: "Видалити модуль",
		classList: ["btn"],
		eventListenerType: 'click',
		eventListener: (event) => {
			openApproveDeletingModal('модуль', () => deleteModule(event, moduleId));
		}
	});

	titleContainer.appendChild(title);
	titleContainer.appendChild(removeModuleBtn);

	const moduleDataBlock = createElement({ elementName: "div", classList: ["module-data-block"] });

	const moduleNumberLabel = createLabelWithInput({
		labelText: 'Номер модуля:',
		inputType: 'number',
		inputName: 'moduleNumber',
		eventListener: (event) => {
			updateNumberInput(event, moduleId, `moduleTitle${moduleId}`, 'Модуль', updateModuleInfo);
		}
	});

	const colloquiumCheckbox = createCheckboxWithLabelAtTheBeginning({
		labelText: 'Є колоквіум',
		inputName: 'isColloquiumExists',
		checked: false,
		eventListener: (event) => {
			checkTogglingColloquium(event, moduleId)
		}
	})

	const colloquiumPointsLabel = createLabelWithInput({
		labelText: 'Бали за колоквіум:',
		inputType: 'number',
		inputName: 'moduleNumber',
		id: `colloquiumPoint${moduleId}`,
		eventListener: (event) => {
			updateNumberInput(event, moduleId, `moduleTitle${moduleId}`, 'Модуль', updateModuleInfo);
		}
	});

	const moduleNameDataBlock = createElement({ elementName: "div", classList: ["module-name-data-block"] });

	const moduleLabel = createLabelWithInput({
		labelText: 'Назва:',
		inputType: 'text',
		inputName: 'name',
		eventListener: (event) => {
			updateModuleInfo(event, moduleId);
		}
	});

	const themesContainer = createElement({ elementName: "div", id: `themesContainer${moduleId}`, classList: ["themes-container"] });

	const addThemeBtn = createElement({
		elementName: "button",
		id: `addThemeBtn${moduleId}`,
		innerText: "Додати тему",
		classList: ["btn", "theme-btn"],
		eventListenerType: 'click',
		eventListener: (event) => {
			addTheme(event, moduleId, `addThemeBtn${moduleId}`, `themesContainer${moduleId}`)
		}
	});

	themesContainer.appendChild(addThemeBtn);

	moduleDataBlock.appendChild(moduleNumberLabel);
	moduleDataBlock.appendChild(colloquiumCheckbox);
	moduleDataBlock.appendChild(colloquiumPointsLabel);

	moduleNameDataBlock.appendChild(moduleLabel);

	moduleContainer.appendChild(titleContainer);
	moduleContainer.appendChild(moduleDataBlock);
	moduleContainer.appendChild(moduleNameDataBlock);
	moduleContainer.appendChild(themesContainer);

	return moduleContainer;
}