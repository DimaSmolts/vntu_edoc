const createModuleBlock = (moduleId) => {
	const moduleContainer = document.createElement("div");
	moduleContainer.classList.add("mini-block");

	const titleContainer = document.createElement("div");
	titleContainer.classList.add("module-title-container");

	const title = document.createElement("p");
	title.id = `moduleTitle${moduleId}`
	title.classList.add("mini-block-title", "module-title");
	title.innerText = 'Модуль';

	const removeModuleBtn = document.createElement("button");
	removeModuleBtn.innerHTML = 'Видалити модуль';
	removeModuleBtn.classList.add("btn");
	removeModuleBtn.onclick = function () {
		moduleContainer.remove();
	};

	titleContainer.appendChild(title);
	titleContainer.appendChild(removeModuleBtn);

	const moduleDataBlock = document.createElement("div");
	moduleDataBlock.classList.add('module-data-block');

	const moduleNumberLabel = document.createElement("label");
	const moduleNumberLabelName = document.createElement("p");
	moduleNumberLabelName.innerText = 'Номер модуля:';
	const moduleNumberInput = document.createElement("input");
	moduleNumberInput.type = 'number';
	moduleNumberInput.name = 'moduleNumber';
	moduleNumberInput.addEventListener('input', function (event) {
		updateNumberInput(event, moduleId, `moduleTitle${moduleId}`, 'Модуль', updateModuleInfo);
	});

	moduleNumberLabel.appendChild(moduleNumberLabelName);
	moduleNumberLabel.appendChild(moduleNumberInput);

	const moduleLabel = document.createElement("label");
	const moduleLabelName = document.createElement("p");
	moduleLabelName.innerText = 'Назва:';
	const moduleInput = document.createElement("input");
	moduleInput.type = 'text';
	moduleInput.name = 'name';
	moduleInput.addEventListener('input', function (event) {
		event.preventDefault()
		updateModuleInfo(event, moduleId);
	});

	moduleLabel.appendChild(moduleLabelName);
	moduleLabel.appendChild(moduleInput);

	const themesContainer = document.createElement("div");
	themesContainer.id = `themesContainer${moduleId}`;
	themesContainer.classList.add('themes-container');

	const addThemeBtn = document.createElement("button");
	addThemeBtn.id = `addThemeBtn${moduleId}`;
	addThemeBtn.innerHTML = 'Додати тему';
	addThemeBtn.classList.add("btn", "theme-btn");

	themesContainer.appendChild(addThemeBtn);

	addThemeBtn.addEventListener('click', (event) => {
		addTheme(event, moduleId, `addThemeBtn${moduleId}`, `themesContainer${moduleId}`)
	});

	moduleDataBlock.appendChild(moduleNumberLabel);
	moduleDataBlock.appendChild(moduleLabel);

	moduleContainer.appendChild(titleContainer);
	moduleContainer.appendChild(moduleDataBlock);
	moduleContainer.appendChild(themesContainer);


	return moduleContainer;
}