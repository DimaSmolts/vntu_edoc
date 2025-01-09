const runValidation = ({
	wpDetails,
	selfworkData,
	pointsDistributionTotalBySemesters,
	semestersNumbersByIds,
	courseworksAndProjectsData
}) => {
	console.log(wpDetails);
	runGeneralInfoValidation(wpDetails);
	runApprovedInfoValidation(wpDetails);
	runSelfworkDataValidation(selfworkData);
	runPointsDistributionTotalValidation({ pointsDistributionTotalBySemesters, semestersNumbersByIds });

	if (courseworksAndProjectsData) {
		runCourseworksAndProjectsValidation(courseworksAndProjectsData);
	}

	dispatchValidationWarningsChange();
}