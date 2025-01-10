const runCourseworksAndProjectsValidation = (courseworksAndProjectsData) => {
	courseworksAndProjectsData.forEach(({
		isExists,
		semesterId,
		pointsTotal,
		taskTypeName,
		semesterNumber
	}) => {
		if (isExists) {
			const assesmentComponentTotalCell = document.getElementById(`assesmentComponentTotalValue${semesterId}`);

			validateCourseTypeWorkAssesmentComponentTotal({
				element: assesmentComponentTotalCell,
				value: pointsTotal,
				taskTypeName,
				semesterId,
				semesterNumber
			})
		}
	});
}
