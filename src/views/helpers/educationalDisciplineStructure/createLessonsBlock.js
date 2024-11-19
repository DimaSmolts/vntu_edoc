const createLessonsBlock = ({ lesson, lessonTypeName, lessonThemeId, semesterEducationalForms }) => {
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

	const lessonHoursBlock = createElement({ elementName: "div", classList: ['hours-block'] });

	const selfworkHoursBlockTitle = createElement({ elementName: "p", classList: ['mini-block-title', 'hours-block-title'], innerText: 'Кількість годин:' });

	lessonHoursBlock.appendChild(selfworkHoursBlockTitle);

	semesterEducationalForms.forEach(form => {
		const hoursLabel = createLabelWithInput({
			labelText: `${form.name}:`,
			inputType: 'number',
			inputName: 'hours',
			value: getHours([lesson], form.colName) ?? '',
			eventListener: (event) => {
				updateHours(event, lessonThemeId, form.educationalFormId)
			}
		});
		lessonHoursBlock.appendChild(hoursLabel);
	})


	// const lessonHoursLabel = createLabelWithInput({
	// 	labelText: 'Кількість годин:',
	// 	inputType: 'number',
	// 	inputName: 'hours',
	// 	value: lesson?.fullTime ? lesson.fullTime : null,
	// 	eventListener: (event) => {
	// 		updateHours(event, lessonThemeId, 1)
	// 	}
	// });

	block.appendChild(lessonNumberLabel);
	block.appendChild(lessonThemeNameLabel);
	block.appendChild(lessonHoursBlock);
	// block.appendChild(lessonHoursLabel);

	return block;
}

const createLessonsBlockTitle = ({ titleName }) => {
	const title = createElement({ elementName: "p", innerText: titleName, classList: ['additional-lesson-title'] });

	return title;
}

const createLessonsBlockWithContainer = ({ titleName, lessons, lessonTypeName, themeId, semesterEducationalForms }) => {
	const container = createElement({ elementName: "div", id: `${lessonTypeName}Container${themeId}` });

	if (lessons.length !== 0) {
		const title = createLessonsBlockTitle({ titleName });

		container.appendChild(title);

		lessons.forEach(lesson => {
			const block = createLessonsBlock({ lesson, lessonTypeName, lessonThemeId: lesson.lessonThemeId, semesterEducationalForms });

			container.appendChild(block);
		})
	}

	return container;
}