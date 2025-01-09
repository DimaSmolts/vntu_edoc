const runValidation = ({
	wpDetails,
	selfworkData,
	pointsDistributionTotalBySemesters,
	semestersNumbersByIds,
	courseworksAndProjectsData
}) => {
	console.log(wpDetails);
	runGeneralInfoValidation(wpDetails)
	runSelfworkDataValidation(selfworkData);
	runPointsDistributionTotalValidation({ pointsDistributionTotalBySemesters, semestersNumbersByIds });

	if (courseworksAndProjectsData) {
		runCourseworksAndProjectsValidation(courseworksAndProjectsData);
	}

	dispatchValidationWarningsChange();
}