const createAdditionalLessonThemesContainer = (theme) => {
	const additionalLessonThemesBlock = createElement({
		elementName: "div",
		classList: ['additional-lessons-themes-block']
	});

	const practicalsLessonThemesBlock = createLessonsBlockWithContainer({
		titleName: 'Практичні:',
		lessons: theme.practicals,
		lessonTypeName: LessonTypesName.practical,
		themeId: theme.id
	})

	const seminarsLessonThemesBlock = createLessonsBlockWithContainer({
		titleName: 'Семінари:',
		lessons: theme.seminars,
		lessonTypeName: LessonTypesName.seminar,
		themeId: theme.id
	})

	const labsLessonThemesBlock = createLessonsBlockWithContainer({
		titleName: 'Лабораторні:',
		lessons: theme.labs,
		lessonTypeName: LessonTypesName.laboratory,
		themeId: theme.id
	})

	additionalLessonThemesBlock.appendChild(practicalsLessonThemesBlock);
	additionalLessonThemesBlock.appendChild(seminarsLessonThemesBlock);
	additionalLessonThemesBlock.appendChild(labsLessonThemesBlock);

	return additionalLessonThemesBlock;
}
