const createLessonsContainer = (themes) => {
	const lessonsContainer = document.getElementById('educationalDisciplineSemesterStructure');
	lessonsContainer.replaceChildren();

	themes.forEach(theme => {
		const themeBlock = createElement({ elementName: "div", classList: ['lesson-themes-block'] });

		const themeTitle = createElement({
			elementName: "p",
			innerText: `Тема ${theme.themeNumber ?? ''}. ${theme.name ?? ''}`,
			classList: ['mini-block-title', 'lesson-theme-title']
		});

		const lectionHoursBlock = createElement({ elementName: "div", classList: ['hours-block'] });
		const selfworkHoursBlock = createElement({ elementName: "div", classList: ['hours-block'] });

		const lectionHoursBlockTitle = createElement({ elementName: "p", classList: ['hours-block-title'], innerText: 'Кількість годин лекцій:' });
		const selfworkHoursBlockTitle = createElement({ elementName: "p", classList: ['hours-block-title'], innerText: 'Кількість годин самостійної роботи:' });

		lectionHoursBlock.appendChild(lectionHoursBlockTitle);
		selfworkHoursBlock.appendChild(selfworkHoursBlockTitle);

		theme.semesterEducationalForms.forEach(form => {
			const lectionHoursLabel = createLabelWithInput({
				labelText: `${form.name}:`,
				inputType: 'number',
				inputName: 'hours',
				value: getHours(theme.lections, form.colName),
				eventListener: (event) => {
					updateHours(event, theme.lections[0].lessonId, form.id)
				}
			});
			lectionHoursBlock.appendChild(lectionHoursLabel);

			const selfWorkHoursLabel = createLabelWithInput({
				labelText: `${form.name}:`,
				inputType: 'number',
				inputName: 'hours',
				value: getHours(theme.selfworks, form.colName),
				eventListener: (event) => {
					updateHours(event, theme.selfworks[0].lessonId, form.id)
				}
			});
			selfworkHoursBlock.appendChild(selfWorkHoursLabel);
		})

		const lessonsButtonsBlock = createElement({ elementName: "div", classList: ['lesson-themes-btn-block'] });

		const addPracticalButton = createElement({
			elementName: "button",
			classList: ['btn'],
			innerText: 'Додати практичне',
			eventListenerType: 'click',
			eventListener: () => {
				createNewLessonBlock({
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
				createNewLessonBlock({
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
				createNewLessonBlock({
					titleName: 'Лабораторні:',
					lessonTypeName: LessonTypesName.laboratory,
					themeId: theme.id,
					semesterEducationalForms: theme.semesterEducationalForms
				})
			}
		});

		lessonsButtonsBlock.appendChild(addPracticalButton);
		lessonsButtonsBlock.appendChild(addSeminarButton);
		lessonsButtonsBlock.appendChild(addLabButton);

		const additionalLessonsBlock = createAdditionalLessonsContainer(theme);

		themeBlock.appendChild(themeTitle);
		themeBlock.appendChild(lectionHoursBlock);
		themeBlock.appendChild(selfworkHoursBlock);
		themeBlock.appendChild(lessonsButtonsBlock);
		themeBlock.appendChild(additionalLessonsBlock);

		lessonsContainer.appendChild(themeBlock);
	});
}
