const getPointsDistributionSlide = async () => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const response = await fetch(`getPointsDistributionSlideContent/?id=${wpId}`, {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json'
		}
	})

	const data = await response.json();

	const pointsDistributionSlideContent = document.getElementById('pointsDistributionSlideContent');
	pointsDistributionSlideContent.innerHTML = data.pointsDistributionSlideContent;
}