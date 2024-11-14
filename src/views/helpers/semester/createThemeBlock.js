const createThemeBlock = (themeId) => {
	const themeBlock = document.createElement("div");
	themeBlock.classList.add("mini-block", "theme-block");

	const titleContainer = document.createElement("div");
	titleContainer.classList.add("theme-title-container");

	const title = document.createElement("p");
	title.id = `themeTitle${themeId}`;
	title.classList.add("mini-block-title", "theme-title");
	title.innerText = 'Тема';

	const removeThemeBtn = document.createElement("button");
	removeThemeBtn.innerHTML = 'Видалити тему';
	removeThemeBtn.classList.add("btn", "theme-btn");
	removeThemeBtn.onclick = function () {
		themeBlock.remove();
	};

	titleContainer.appendChild(title);
	titleContainer.appendChild(removeThemeBtn);

	const themeDataBlock = document.createElement("div");
	themeDataBlock.classList.add('theme-data-block');

	const themeNumberLabel = document.createElement("label");
	const themeNumberLabelName = document.createElement("p");
	themeNumberLabelName.innerText = 'Номер теми:';
	const themeNumberInput = document.createElement("input");
	themeNumberInput.type = 'number';
	themeNumberInput.name = 'themeNumber';
	themeNumberInput.addEventListener('input', function (event) {
		updateNumberInput(event, themeId, `themeTitle${themeId}`, 'Тема', updateThemeInfo);
	});

	themeNumberLabel.appendChild(themeNumberLabelName);
	themeNumberLabel.appendChild(themeNumberInput);

	const themeNameLabel = document.createElement("label");
	const themeNameLabelName = document.createElement("p");
	themeNameLabelName.innerText = 'Назва:';
	const themeNameInput = document.createElement("input");
	themeNameInput.type = 'text';
	themeNameInput.name = 'name';
	themeNameInput.addEventListener('input', function (event) {
		event.preventDefault()
		updateThemeInfo(event, themeId);
	});
	themeNameLabel.appendChild(themeNameLabelName);
	themeNameLabel.appendChild(themeNameInput);

	const themeDescriptionLabel = document.createElement("label");
	const themeDescriptionLabelName = document.createElement("p");
	themeDescriptionLabelName.innerText = 'Опис:';
	const themeDescriptionInput = document.createElement("textarea");
	themeDescriptionInput.rows = '5';
	themeDescriptionInput.name = 'description';
	themeDescriptionInput.addEventListener('input', function (event) {
		event.preventDefault()
		updateThemeInfo(event, themeId);
	});
	themeDescriptionLabel.appendChild(themeDescriptionLabelName);
	themeDescriptionLabel.appendChild(themeDescriptionInput);

	themeDataBlock.appendChild(themeNumberLabel);
	themeDataBlock.appendChild(themeNameLabel);

	themeBlock.appendChild(titleContainer);
	themeBlock.appendChild(themeDataBlock);
	themeBlock.appendChild(themeDescriptionLabel);

	return themeBlock;
}