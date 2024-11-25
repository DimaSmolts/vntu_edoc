const createLessonsBlock = ({ lesson, lessonTypeName, lessonThemeId, semesterEducationalForms }) => {
	const block = createElement({
		elementName: "div",
		id: `lessonBlock${lessonThemeId}`,
		classList: ['additional-lesson-themes-block']
	});

	const lessonNumberInput = createElement({
		elementName: "input",
		type: 'number',
		name: 'lessonThemeNumber',
		value: lesson?.lessonThemeNumber ? lesson.lessonThemeNumber : null,
		eventListenerType: 'input',
		eventListener: (event) => {
			updateLessonThemeInfo(event, lessonThemeId);
		}
	});

	const lessonThemeNameInput = createElement({
		elementName: "input",
		type: 'text',
		name: 'name',
		value: lesson?.lessonThemeName ? lesson.lessonThemeName : '',
		eventListenerType: 'input',
		eventListener: (event) => {
			updateLessonThemeInfo(event, lessonThemeId);
		}
	});

	const hoursBlockColumnsClass = semesterEducationalForms.length === 1 ? 'hours-block-one-column' : 'hours-block-two-columns';

	const lessonHoursBlockForInputs = createElement({ elementName: "div", classList: ['hours-block', hoursBlockColumnsClass] });

	semesterEducationalForms.forEach(form => {
		const hoursInput = createElement({
			elementName: "input",
			type: 'number',
			name: 'hours',
			value: getHours([lesson], form.colName) ?? '',
			eventListenerType: 'input',
			eventListener: (event) => {
				updateHours(event, lessonThemeId, form.id)
			}
		});
		lessonHoursBlockForInputs.appendChild(hoursInput);
	})

	const removeLessonBtn = createElement({
		elementName: "button",
		innerText: "Видалити",
		classList: ["btn", "remove-lesson-btn"],
		eventListenerType: 'click',
		eventListener: (event) => {
			deleteLesson(event, lessonThemeId);
		}
	});

	block.appendChild(lessonNumberInput);
	block.appendChild(lessonThemeNameInput);
	block.appendChild(lessonHoursBlockForInputs);
	block.appendChild(removeLessonBtn);

	return block;
}

const createLessonsBlockTitle = ({ titleName }) => {
	const title = createElement({ elementName: "p", innerText: titleName, classList: ['additional-lesson-title'] });

	return title;
}

const createLessonsBlockWithContainer = ({ titleName, lessons, lessonTypeName, themeId, semesterEducationalForms }) => {
	const container = createElement({ elementName: "div", id: `${lessonTypeName}Container${themeId}` });

	if (lessons.length !== 0) {
		const labels = createElement({
			elementName: "div",
			id: `${lessonTypeName}LabelsBlock`,
			classList: ['additional-lesson-themes-block']
		});

		const title = createLessonsBlockTitle({ titleName });

		const lessonNumberLabel = createElement({ elementName: "p", innerText: `Номер заняття:`, classList: ['lesson-name-label'] });
		const lessonThemeNameLabel = createElement({ elementName: "p", innerText: `Назва теми:` });

		const hoursBlockColumnsClass = semesterEducationalForms.length === 1 ? 'hours-block-one-column' : 'hours-block-two-columns';

		const lessonHoursBlockForHeader = createElement({ elementName: "div", classList: ['hours-block', hoursBlockColumnsClass, 'additional-hours-block-for-header'] });

		const hoursBlockTitle = createElement({
			elementName: "p",
			classList: ['hours-block-title', 'additional-hours-block-title'],
			innerText: 'Кількість годин:'
		});

		lessonHoursBlockForHeader.appendChild(hoursBlockTitle);

		const lessonHoursBlockForLabels = createElement({ elementName: "div", classList: ['hours-block', hoursBlockColumnsClass] });

		labels.appendChild(title);
		labels.appendChild(lessonHoursBlockForHeader);
		labels.appendChild(lessonNumberLabel);
		labels.appendChild(lessonThemeNameLabel);
		labels.appendChild(lessonHoursBlockForLabels);

		semesterEducationalForms.forEach(form => {
			const hoursLabel = createElement({ elementName: "p", innerText: `${form.name}:` });
			lessonHoursBlockForLabels.appendChild(hoursLabel);
		})

		container.appendChild(labels);

		lessons.forEach(lesson => {
			const block = createLessonsBlock({ lesson, lessonTypeName, lessonThemeId: lesson.lessonThemeId, semesterEducationalForms });

			container.appendChild(block);
		})
	}

	return container;
}