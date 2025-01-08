const runValidation = ({ selfworkData, pointsDistributionTotalBySemesters, semestersNumbersByIds }) => {
	runSelfworkDataValidation(selfworkData);
	runPointsDistributionTotalValidation({ pointsDistributionTotalBySemesters, semestersNumbersByIds });

	dispatchValidationWarningsChange();
}