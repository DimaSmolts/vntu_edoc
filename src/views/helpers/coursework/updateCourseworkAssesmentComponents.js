const updateCourseworkAssesmentComponents = (event, semesterId) => {
    const container = document.getElementById(`courseworkAssesmentComponents${semesterId}`);

    updateAssesmentComponents(event, semesterId, container, 'courseworkAssessmentComponents', 'Coursework');
}