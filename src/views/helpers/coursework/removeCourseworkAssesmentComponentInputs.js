const removeCourseworkAssesmentComponentInputs = (event, semesterId) => {
	event.preventDefault();

	const parent = event.target.parentNode;
	parent.remove();
	
    const container = document.getElementById(`courseworkAssesmentComponents${semesterId}`);
	updateAssesmentComponents(event, semesterId, container, 'courseworkAssessmentComponents', 'Coursework')
}