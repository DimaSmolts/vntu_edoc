const createLessonThemesContainer = (themes) => {
	const lessonThemesContainer = document.getElementById('educationalDisciplineSemesterStructure');
	lessonThemesContainer.replaceChildren();

	themes.forEach(theme => {
		console.log(theme)
		const themeBlock = createElement({ elementName: "div", classList: ['lesson-themes-block'] });

		const themeTitle = createElement({
			elementName: "p",
			innerText: `Тема ${theme.themeNumber ?? ''}. ${theme.name ?? ''}`,
			classList: ['mini-block-title', 'lesson-theme-title']
		});

		const lectionHoursBlock = createElement({ elementName: "div" });
		const selfworkHoursBlock = createElement({ elementName: "div" });

		const lectionHoursLabel = createLabelWithInput({
			labelText: 'Кількість годин лекцій:',
			inputType: 'number',
			inputName: 'hours',
			value: theme.lections[0]?.fullTime ?? '',
			eventListener: (event) => {
				updateHours(event, theme.id, 1)
			}
		});

		const selfWorkHoursLabel = createLabelWithInput({
			labelText: 'Кількість годин самостійної роботи:',
			inputType: 'number',
			inputName: 'hours',
			value: theme.lections[0]?.fullTime ?? '',
			eventListener: (event) => {
				updateHours(event, theme.id, 1)
			}
		});

		lectionHoursBlock.appendChild(lectionHoursLabel);
		selfworkHoursBlock.appendChild(selfWorkHoursLabel);

		const lessonThemesButtonsBlock = createElement({ elementName: "div", classList: ['lesson-themes-btn-block'] });

		const addPracticalButton = createElement({
			elementName: "button",
			classList: ['btn'],
			innerText: 'Додати практичне',
			eventListenerType: 'click',
			eventListener: () => {
				createNewLessonThemeBlock({
					titleName: 'Практичні:',
					lessonTypeName: LessonTypesName.practical,
					themeId: theme.id
				})
			}
		});

		const addSeminarButton = createElement({
			elementName: "button",
			classList: ['btn'],
			innerText: 'Додати семінар',
			eventListenerType: 'click',
			eventListener: () => {
				createNewLessonThemeBlock({
					titleName: 'Семінари:',
					lessonTypeName: LessonTypesName.seminar,
					themeId: theme.id
				})
			}
		});

		const addLabButton = createElement({
			elementName: "button",
			classList: ['btn'],
			innerText: 'Додати лабораторне',
			eventListenerType: 'click',
			eventListener: () => {
				createNewLessonThemeBlock({
					titleName: 'Лабораторні:',
					lessonTypeName: LessonTypesName.laboratory,
					themeId: theme.id
				})
			}
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
