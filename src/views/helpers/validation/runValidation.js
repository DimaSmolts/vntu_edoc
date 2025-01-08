const runValidation = ({
	selfworkData,
	pointsDistributionTotalBySemesters,
	semestersNumbersByIds,
	courseworksAndProjectsData
}) => {
	runSelfworkDataValidation(selfworkData);
	runPointsDistributionTotalValidation({ pointsDistributionTotalBySemesters, semestersNumbersByIds });

	if (courseworksAndProjectsData) {
		runCourseworksAndProjectsValidation(courseworksAndProjectsData);
	}

	dispatchValidationWarningsChange();
}