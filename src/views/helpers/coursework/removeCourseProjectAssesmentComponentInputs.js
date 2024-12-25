const removeCourseProjectAssesmentComponentInputs = (event, semesterId) => {
	event.preventDefault();

	const parent = event.target.parentNode;
	parent.remove();
	
    const container = document.getElementById(`courseProjectAssesmentComponents${semesterId}`);
	updateAssesmentComponents(event, semesterId, container, 'courseProjectAssessmentComponents', 'CourseProject')
}