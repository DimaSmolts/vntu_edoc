const updateCourseProjectAssesmentComponents = (event, semesterId) => {
    const container = document.getElementById(`courseProjectAssesmentComponents${semesterId}`);

    updateAssesmentComponents(event, semesterId, container, 'courseProjectAssessmentComponents', 'CourseProject');
}