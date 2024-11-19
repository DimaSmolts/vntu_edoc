const getHours = (lessons, lessonFormName) => {
	const lessonData = lessons
		.map(lesson => lesson?.educationalFormHours)
		.flat()
		.find(lesson => lesson?.lessonFormName === lessonFormName);

	return lessonData?.hours ?? '';
}
