const createLessonThemesContainer = (themes) => {
	const lessonThemesContainer = document.getElementById('educationalDisciplineSemesterStructure');
	lessonThemesContainer.replaceChildren();

	themes.forEach(theme => {
		console.log(theme)
		const themeBlock = document.createElement("div");
		themeBlock.classList.add('lesson-themes-block');

		const themeTitle = document.createElement("p");
		themeTitle.classList.add('mini-block-title', 'lesson-theme-title');
		themeTitle.innerText = `Тема ${theme.themeNumber ?? ''}. ${theme.name ?? ''}`;

		const lectionAndSelfworkHoursBlock = document.createElement("div");
		lectionAndSelfworkHoursBlock.classList.add('two-column');

		const lectionHoursBlock = document.createElement("div");
		const selfworkHoursBlock = document.createElement("div");

		const lectionHoursLabel = createLabelWithInput({
			labelText: 'Кількість годин лекцій:',
			inputType: 'number',
			inputName: 'hours',
			value: theme.lections[0].fullTime,
			eventListener: (event) => {
				updateHours(event, lessonThemeId, 1)
			}
		});

		const selfWorkHoursLabel = createLabelWithInput({
			labelText: 'Кількість годин самостійної роботи:',
			inputType: 'number',
			inputName: 'hours',
			value: theme.selfworks[0].fullTime,
			eventListener: (event) => {
				updateHours(event, lessonThemeId, 1)
			}
		});

		lectionHoursBlock.appendChild(lectionHoursLabel);
		selfworkHoursBlock.appendChild(selfWorkHoursLabel);

		const lessonThemesButtonsBlock = document.createElement("div");
		lessonThemesButtonsBlock.classList.add('lesson-themes-btn-block');

		const addPracticalButton = document.createElement("button");
		addPracticalButton.classList.add('btn');
		addPracticalButton.innerText = 'Додати практичне';
		addPracticalButton.addEventListener('click', () => {
			createNewLessonThemeBlock({
				titleName: 'Практичні:',
				lessonTypeName: LessonTypesName.practical,
				themeId: theme.id
			})
		});

		const addSeminarButton = document.createElement("button");
		addSeminarButton.classList.add('btn');
		addSeminarButton.innerText = 'Додати семінар';
		addSeminarButton.addEventListener('click', () => {
			createNewLessonThemeBlock({
				titleName: 'Семінари:',
				lessonTypeName: LessonTypesName.seminar,
				themeId: theme.id
			})
		});

		const addLabButton = document.createElement("button");
		addLabButton.classList.add('btn');
		addLabButton.innerText = 'Додати лабораторне';
		addLabButton.addEventListener('click', () => {
			createNewLessonThemeBlock({
				titleName: 'Лабораторні:',
				lessonTypeName: LessonTypesName.laboratory,
				themeId: theme.id
			})
		});

		lessonThemesButtonsBlock.appendChild(addPracticalButton);
		lessonThemesButtonsBlock.appendChild(addSeminarButton);
		lessonThemesButtonsBlock.appendChild(addLabButton);

		const additionalLessonThemesBlock = createAdditionalLessonThemesContainer(theme);

		themeBlock.appendChild(themeTitle);
		themeBlock.appendChild(lectionHoursBlock);
		themeBlock.appendChild(selfworkHoursBlock);
		themeBlock.appendChild(lessonThemesButtonsBlock);
		themeBlock.appendChild(additionalLessonThemesBlock);

		lessonThemesContainer.appendChild(themeBlock);
	});
}
