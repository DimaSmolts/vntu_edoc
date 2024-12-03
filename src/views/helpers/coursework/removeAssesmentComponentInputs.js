const removeAssesmentComponentInputs = (event, semesterId) => {
	event.preventDefault();

	const parent = event.target.parentNode;
	parent.remove();
	updateAssesmentComponents(event, semesterId);
}