const createLessonsBlock = ({ lesson, lessonTypeName, lessonThemeId }) => {
	const block = document.createElement("div");
	block.classList.add('additional-lesson-themes-block');
	block.id = `${lessonTypeName}Block${lessonThemeId}`;

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
	const title = document.createElement("p");
	title.classList.add('additional-lesson-title');
	title.innerText = `${titleName}`;

	return title;
}

const createLessonsBlockWithContainer = ({ titleName, lessons, lessonTypeName, themeId }) => {
	const container = document.createElement("div");
	container.id = `${lessonTypeName}Container${themeId}`;

	if (lessons.length !== 0) {
		const title = document.createElement("p");
		title.classList.add('additional-lesson-title');
		title.innerText = `${titleName}`;

		container.appendChild(title);

		lessons.forEach(lesson => {
			const block = createLessonsBlock({ lesson, lessonTypeName, lessonThemeId: lesson.lessonThemeId });

			container.appendChild(block);
		})
	}

	return container;
}