const runPointsDistributionTotalValidation = ({ pointsDistributionTotalBySemesters, semestersNumbersByIds }) => {
	if (semestersNumbersByIds) {
		const semestersNumbersByIdsEntries = Object.entries(semestersNumbersByIds);
	
		if (semestersNumbersByIdsEntries?.length > 0) {
			semestersNumbersByIdsEntries.forEach(([semesterId, semesterNumber]) => {
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
}
