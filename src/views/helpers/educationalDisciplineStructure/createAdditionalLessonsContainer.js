const createAdditionalLessonsContainer = (theme) => {
	const additionalLessonsBlock = createElement({
		elementName: "div",
		classList: ['additional-lessons-themes-block']
	});

	const practicalsLessonsBlock = createLessonsBlockWithContainer({
		titleName: 'Практичні:',
		lessons: theme.practicals,
		lessonTypeName: LessonTypesName.practical,
		themeId: theme.id,
		semesterEducationalForms: theme.semesterEducationalForms
	})

	const seminarsLessonsBlock = createLessonsBlockWithContainer({
		titleName: 'Семінари:',
		lessons: theme.seminars,
		lessonTypeName: LessonTypesName.seminar,
		themeId: theme.id,
		semesterEducationalForms: theme.semesterEducationalForms
	})

	const labsLessonsBlock = createLessonsBlockWithContainer({
		titleName: 'Лабораторні:',
		lessons: theme.labs,
		lessonTypeName: LessonTypesName.laboratory,
		themeId: theme.id,
		semesterEducationalForms: theme.semesterEducationalForms
	})

	additionalLessonsBlock.appendChild(practicalsLessonsBlock);
	additionalLessonsBlock.appendChild(seminarsLessonsBlock);
	additionalLessonsBlock.appendChild(labsLessonsBlock);

	return additionalLessonsBlock;
}
