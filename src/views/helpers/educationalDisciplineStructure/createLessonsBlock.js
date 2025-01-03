const createLessonsBlock = ({ lesson, lessonId, semesterEducationalForms, container }) => {
	const block = createElement({
		elementName: "div",
		id: `lessonBlock${lessonId}`,
		classList: ['additional-lesson-themes-block']
	});

	const lessonNumberInput = createElement({
		elementName: "input",
		type: 'number',
		name: 'lessonNumber',
		value: lesson?.lessonNumber ? lesson.lessonNumber : null,
		eventListenerType: 'input',
		eventListener: (event) => {
			updateLessonInfo(event, lessonId);
		}
	});

	const lessonNameInput = createElement({
		elementName: "input",
		type: 'text',
		name: 'name',
		value: lesson?.lessonName ? lesson.lessonName : '',
		eventListenerType: 'input',
		eventListener: (event) => {
			updateLessonInfo(event, lessonId);
		}
	});

	let hoursBlockColumnsClass = 'hours-block-one-column';

	switch (semesterEducationalForms.length) {
		case 2:
			hoursBlockColumnsClass = 'hours-block-two-columns';
			break;
		case 3:
			hoursBlockColumnsClass = 'hours-block-three-columns';
			break;
		default:
			break;
	}

	const lessonHoursBlockForInputs = createElement({ elementName: "div", classList: ['hours-block', hoursBlockColumnsClass] });

	semesterEducationalForms.forEach(form => {
		const hoursInput = createElement({
			elementName: "input",
			type: 'number',
			name: 'hours',
			value: getHours([lesson], form.colName) ?? '',
			eventListenerType: 'input',
			eventListener: (event) => {
				updateHours(event, lessonId, form.id)
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
			openApproveDeletingModal('заняття', () => deleteLesson(event, lessonId, container));
		}
	});

	block.appendChild(lessonNumberInput);
	block.appendChild(lessonNameInput);
	block.appendChild(lessonHoursBlockForInputs);
	block.appendChild(removeLessonBtn);

	return block;
}

const createLessonsBlockTitle = ({ titleName }) => {
	const title = createElement({ elementName: "p", innerText: titleName, classList: ['additional-lesson-title'] });

	return title;
}

const createLessonsBlockLabels = ({ titleName, lessonTypeName, semesterEducationalForms }) => {
	const labels = createElement({
		elementName: "div",
		id: `${lessonTypeName}LabelsBlock`,
		classList: ['additional-lesson-themes-block']
	});

	const title = createLessonsBlockTitle({ titleName });

	const lessonNumberLabel = createElement({ elementName: "p", innerText: `Номер заняття:`, classList: ['lesson-name-label'] });
	const lessonNameLabel = createElement({ elementName: "p", innerText: `Назва теми:` });

	let hoursBlockColumnsClass = 'hours-block-one-column';

	switch (semesterEducationalForms.length) {
		case 2:
			hoursBlockColumnsClass = 'hours-block-two-columns';
			break;
		case 3:
			hoursBlockColumnsClass = 'hours-block-three-columns';
			break;
		default:
			break;
	}

	const lessonHoursBlockForHeader = createElement({ elementName: "div", classList: ['hours-block', hoursBlockColumnsClass, 'additional-hours-block-for-header'] });

	const hoursBlockTitle = createElement({
		elementName: "p",
		classList: ['hours-block-title', 'additional-hours-block-title'],
		innerText: 'Кількість годин:'
	});

	lessonHoursBlockForHeader.appendChild(hoursBlockTitle);

	const lessonHoursBlockForLabels = createElement({ elementName: "div", classList: ['hours-block', hoursBlockColumnsClass] });

	semesterEducationalForms.forEach(form => {
		const hoursLabel = createElement({ elementName: "p", innerText: `${form.name}:` });
		lessonHoursBlockForLabels.appendChild(hoursLabel);
	})

	labels.appendChild(title);
	labels.appendChild(lessonHoursBlockForHeader);
	labels.appendChild(lessonNumberLabel);
	labels.appendChild(lessonNameLabel);
	labels.appendChild(lessonHoursBlockForLabels);

	return labels;
}

const createLessonsBlockWithContainer = ({ titleName, lessons, lessonTypeName, themeId, semesterEducationalForms }) => {
	const container = createElement({ elementName: "div", id: `${lessonTypeName}Container${themeId}` });

	if (lessons.length !== 0) {
		const labels = createLessonsBlockLabels({ titleName, lessonTypeName, semesterEducationalForms })

		container.appendChild(labels);

		lessons.forEach(lesson => {
			const block = createLessonsBlock({ lesson, lessonId: lesson.lessonId, semesterEducationalForms, container });

			container.appendChild(block);
		})
	}

	return container;
}