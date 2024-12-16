const getCourseworkSlide = async () => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const response = await fetch(`api/getCoursework/?id=${wpId}`, {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json'
		}
	})

	const data = await response.json();

	const courseworkInfoSlide = document.getElementById('courseworkInfoSlide');

	if (courseworkInfoSlide) {
		courseworkInfoSlide.remove();
	}

	if (data?.isCourseworkExists) {
		const courseworkInfoSlide = createSlide(data?.courseworkInfoSlideContent, 'courseworkInfoSlide');

		const prevSlide = document.getElementById('pointsDistributionSlide');

		prevSlide.after(courseworkInfoSlide);
	}
}