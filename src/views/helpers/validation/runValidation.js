const runValidation = ({
	wpDetails,
	selfworkData,
	pointsDistributionTotalBySemesters,
	semestersNumbersByIds,
	courseworksAndProjectsData
}) => {
	console.log({
		wpDetails,
		selfworkData,
		pointsDistributionTotalBySemesters,
		semestersNumbersByIds,
		courseworksAndProjectsData
	});
	runGeneralInfoValidation(wpDetails);
	runApprovedInfoValidation(wpDetails);
	runWPProgramValidation(wpDetails);
	runSelfworkDataValidation(selfworkData);
	runPointsDistributionTotalValidation({ pointsDistributionTotalBySemesters, semestersNumbersByIds });
	runCourseworksAndProjectsValidation(courseworksAndProjectsData);

	dispatchValidationWarningsChange();
}