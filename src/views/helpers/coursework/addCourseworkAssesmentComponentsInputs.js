const addCourseworkAssesmentComponentsInputs = (event, semesterId) => {
	event.preventDefault();

	const container = document.getElementById(`courseworkAssesmentComponents${semesterId}`);

	const addAssesmentComponent = document.getElementById(`addCourseworkAssesmentComponent${semesterId}`);

	addAssesmentComponentsInputs(
		event,
		semesterId,
		container,
		addAssesmentComponent,
		updateCourseworkAssesmentComponents,
		removeCourseworkAssesmentComponentInputs
	)
}