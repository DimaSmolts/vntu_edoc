const updateValidation = async () => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const data = await makeGetRequestAndReturnData({
		linkWithParams: `api/getDataForValidation/?id=${wpId}`
	});

	const { selfworkData, pointsDistributionTotalBySemesters, semestersNumbersByIds, courseworksAndProjectsData } = data;

	runValidation({
		selfworkData,
		pointsDistributionTotalBySemesters,
		semestersNumbersByIds,
		courseworksAndProjectsData
	})
}