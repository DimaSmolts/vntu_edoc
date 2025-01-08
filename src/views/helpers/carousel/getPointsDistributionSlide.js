const getPointsDistributionSlide = async () => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const data = await makeGetRequestAndReturnData({
		linkWithParams: `api/getPointsDistributionSlideContent/?id=${wpId}`
	});

	const pointsDistributionSlideContent = document.getElementById('pointsDistributionSlideContent');
	pointsDistributionSlideContent.innerHTML = data.pointsDistributionSlideContent;
}