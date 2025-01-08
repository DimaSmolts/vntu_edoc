const runCourseworksAndProjectsValidation = (courseworksAndProjectsData) => {
	courseworksAndProjectsData.forEach(({
		semesterId,
		pointsTotal,
		taskTypeName,
		semesterNumber
	}) => {
		const assesmentComponentTotalCell = document.getElementById(`assesmentComponentTotalValue${semesterId}`);

		validateCourseTypeWorkAssesmentComponentTotal({
			element: assesmentComponentTotalCell,
			value: pointsTotal,
			taskTypeName,
			semesterId,
			semesterNumber
		})
	});
}
