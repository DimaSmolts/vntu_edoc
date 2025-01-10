const runPointsDistributionTotalValidation = ({ pointsDistributionTotalBySemesters, semestersNumbersByIds }) => {
	if (semestersNumbersByIds?.length > 0) {
		Object.entries(semestersNumbersByIds).forEach(([semesterId, semesterNumber]) => {
			const semesterTotalCell = document.getElementById(`fullSemester${semesterId}Total`);

			validateSemesterPointDistribution({
				element: semesterTotalCell,
				value: pointsDistributionTotalBySemesters[`semester${semesterId}Sum`],
				semesterId,
				semesterNumber
			})
		});
	}
}
