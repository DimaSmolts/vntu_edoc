const addCourseProjectAssesmentComponentsInputs = (event, semesterId) => {
	event.preventDefault();

	const container = document.getElementById(`courseProjectAssesmentComponents${semesterId}`);

	const addAssesmentComponent = document.getElementById(`addCourseProjectAssesmentComponent${semesterId}`);

	addAssesmentComponentsInputs(
		event,
		semesterId,
		container,
		addAssesmentComponent,
		updateCourseProjectAssesmentComponents,
		removeCourseProjectAssesmentComponentInputs
	)
}