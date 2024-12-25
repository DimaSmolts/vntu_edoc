const getCourseworkSlide = async () => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const response = await fetch(`api/getCourseworkAndProject/?id=${wpId}`, {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json'
		}
	})

	const data = await response.json();

	const courseworksAndProjectsInfoSlide = document.getElementById('courseworksAndProjectsInfoSlide');

	if (courseworksAndProjectsInfoSlide) {
		courseworksAndProjectsInfoSlide.remove();
	}

	if (data?.isCourseworkExists) {
		const courseworksAndProjectsInfoSlide = createSlide(data?.courseworksAndProjectsInfoSlideContent, 'courseworksAndProjectsInfoSlide');

		const prevSlide = document.getElementById('pointsDistributionSlide');

		prevSlide.after(courseworksAndProjectsInfoSlide);
	}
}