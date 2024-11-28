const getStructureForAssessmentCriteriasSlides = async () => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const response = await fetch(`getLessonsAndExamingsStructure/?id=${wpId}`, {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json'
		}
	})

	const data = await response.json();

	return addAssessmentCriteriasSlides(data);
}