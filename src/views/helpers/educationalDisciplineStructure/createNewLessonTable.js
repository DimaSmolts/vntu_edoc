const createNewLessonTable = async (event, lessonTypeName) => {
	event.target.disabled = true;

	const container = document.getElementById(`${lessonTypeName}Container`);

	container.classList.remove('lesson-table-invisible');
	container.classList.add('lesson-table-visible')
}
