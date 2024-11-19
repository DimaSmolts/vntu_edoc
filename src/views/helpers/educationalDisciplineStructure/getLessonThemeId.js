const getLessonThemeId = (lessons, lessonFormName) => {
	const lessonData = lessons
		.map(lesson => lesson?.educationalFormHours)
		.flat()
		.find(lesson => lesson?.lessonFormName === lessonFormName);
	console.log(lessons);
	return lessonData?.lessonThemeId ?? null;
}