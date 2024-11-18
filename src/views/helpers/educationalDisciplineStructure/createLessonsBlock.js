const createLessonsBlock = ({ lesson, lessonTypeName, lessonThemeId }) => {
	const block = createElement({
		elementName: "div",
		id: `${lessonTypeName}Block${lessonThemeId}`,
		classList: ['additional-lesson-themes-block']
	});

	const lessonNumberLabel = createLabelWithInput({
		labelText: 'Номер заняття:',
		inputType: 'number',
		inputName: 'lessonThemeNumber',
		value: lesson?.lessonThemeNumber ? lesson.lessonThemeNumber : null,
		eventListener: (event) => {
			updateLessonThemeInfo(event, lessonThemeId);
		}
	});

	const lessonThemeNameLabel = createLabelWithInput({
		labelText: 'Назва теми:',
		inputType: 'text',
		inputName: 'name',
		value: lesson?.lessonThemeName ? lesson.lessonThemeName : '',
		eventListener: (event) => {
			updateLessonThemeInfo(event, lessonThemeId);
		}
	});

	const lessonHoursLabel = createLabelWithInput({
		labelText: 'Кількість годин:',
		inputType: 'number',
		inputName: 'hours',
		value: lesson?.fullTime ? lesson.fullTime : null,
		eventListener: (event) => {
			updateHours(event, lessonThemeId, 1)
		}
	});

	block.appendChild(lessonNumberLabel);
	block.appendChild(lessonThemeNameLabel);
	block.appendChild(lessonHoursLabel);

	return block;
}

const createLessonsBlockTitle = ({ titleName }) => {
	const title = createElement({ elementName: "p", innerText: titleName, classList: ['additional-lesson-title'] });

	return title;
}

const createLessonsBlockWithContainer = ({ titleName, lessons, lessonTypeName, themeId }) => {
	const container = createElement({ elementName: "div", id: `${lessonTypeName}Container${themeId}` });

	if (lessons.length !== 0) {
		const title = createLessonsBlockTitle({ titleName });

		container.appendChild(title);

		lessons.forEach(lesson => {
			const block = createLessonsBlock({ lesson, lessonTypeName, lessonThemeId: lesson.lessonThemeId });

			container.appendChild(block);
		})
	}

	return container;
}