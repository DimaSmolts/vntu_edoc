const getCourseworkSlide = async () => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const data = await makeGetRequestAndReturnData({
		linkWithParams: `api/getCourseworkAndProject/?id=${wpId}`
	});

	const courseworksAndProjectsInfoSlide = document.getElementById('courseworksAndProjectsInfoSlide');

	if (courseworksAndProjectsInfoSlide) {
		courseworksAndProjectsInfoSlide.remove();
	}

	if (data?.isCourseTaskExists) {
		const courseworksAndProjectsInfoSlide = createSlide(data?.courseworksAndProjectsInfoSlideContent, 'courseworksAndProjectsInfoSlide');

		const prevSlide = document.getElementById('pointsDistributionSlide');

		prevSlide.after(courseworksAndProjectsInfoSlide);
	}
}