const createLessonThemesContainer = (themes) => {
	const lessonThemesContainer = document.getElementById('educationalDisciplineSemesterStructure');
	lessonThemesContainer.replaceChildren();

	themes.forEach(theme => {
		const themeBlock = createElement({ elementName: "div", classList: ['lesson-themes-block'] });

		const themeTitle = createElement({
			elementName: "p",
			innerText: `Тема ${theme.themeNumber ?? ''}. ${theme.name ?? ''}`,
			classList: ['mini-block-title', 'lesson-theme-title']
		});

		const lectionHoursBlock = createElement({ elementName: "div", classList: ['hours-block'] });
		const selfworkHoursBlock = createElement({ elementName: "div", classList: ['hours-block'] });

		const lectionHoursBlockTitle = createElement({ elementName: "p", classList: ['mini-block-title', 'hours-block-title'], innerText: 'Кількість годин лекцій:' });
		const selfworkHoursBlockTitle = createElement({ elementName: "p", classList: ['mini-block-title', 'hours-block-title'], innerText: 'Кількість годин самостійної роботи:' });

		lectionHoursBlock.appendChild(lectionHoursBlockTitle);
		selfworkHoursBlock.appendChild(selfworkHoursBlockTitle);

		theme.semesterEducationalForms.forEach(form => {
			const lectionHoursLabel = createLabelWithInput({
				labelText: `${form.name}:`,
				inputType: 'number',
				inputName: 'hours',
				value: getHours(theme.lections, form.colName),
				eventListener: (event) => {
					updateHours(event, theme.lections[0].lessonThemeId, form.id)
				}
			});
			lectionHoursBlock.appendChild(lectionHoursLabel);

			const selfWorkHoursLabel = createLabelWithInput({
				labelText: `${form.name}:`,
				inputType: 'number',
				inputName: 'hours',
				value: getHours(theme.selfworks, form.colName),
				eventListener: (event) => {
					updateHours(event, theme.selfworks[0].lessonThemeId, form.id)
				}
			});
			selfworkHoursBlock.appendChild(selfWorkHoursLabel);
		})

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
					themeId: theme.id,
					semesterEducationalForms: theme.semesterEducationalForms
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
					themeId: theme.id,
					semesterEducationalForms: theme.semesterEducationalForms
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
					themeId: theme.id,
					semesterEducationalForms: theme.semesterEducationalForms
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
