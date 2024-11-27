const createNewLessonBlock = async ({ titleName, lessonTypeName, themeId, semesterEducationalForms }) => {
	const container = document.getElementById(`${lessonTypeName}Container${themeId}`);

	const newThemeBlock = await createNewLesson({ themeId, lessonTypeName, semesterEducationalForms, container });

	if (container.hasChildNodes()) {
		container.appendChild(newThemeBlock);
	} else {
		const title = createLessonsBlockLabels({ titleName, lessonTypeName, semesterEducationalForms });

		container.appendChild(title);
		container.appendChild(newThemeBlock);
	}
}
