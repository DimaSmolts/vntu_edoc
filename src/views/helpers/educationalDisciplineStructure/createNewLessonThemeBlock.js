const createNewLessonThemeBlock = async ({ titleName, lessonTypeName, themeId }) => {
	const container = document.getElementById(`${lessonTypeName}Container${themeId}`);

	const newThemeBlock = await createNewLessonTheme({ themeId, lessonTypeName });

	if (container.hasChildNodes()) {
		container.appendChild(newThemeBlock);
	} else {
		const title = createLessonsBlockTitle({ titleName });

		container.appendChild(title);
		container.appendChild(newThemeBlock);
	}
}
