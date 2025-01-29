const runValidation = ({
	wpDetails,
	educationalForms,
	selfworkData,
	pointsDistributionTotalBySemesters,
	semestersNumbersByIds,
	courseworksAndProjectsData
}) => {
	runGeneralInfoValidation(wpDetails);
	runApprovedInfoValidation(wpDetails);
	runWPProgramValidation({ wpDetails, educationalForms });
	runSelfworkDataValidation(selfworkData);
	runPointsDistributionTotalValidation({ pointsDistributionTotalBySemesters, semestersNumbersByIds });
	runCourseworksAndProjectsValidation(courseworksAndProjectsData);

	dispatchValidationWarningsChange();
}