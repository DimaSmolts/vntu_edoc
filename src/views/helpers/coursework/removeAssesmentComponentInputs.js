const removeAssesmentComponentInputs = (event, semesterId, taskTypeId) => {
	event.preventDefault();

	const parent = event.target.parentNode;
	parent.remove();

	updateAssesmentComponents(event, semesterId, taskTypeId)
}