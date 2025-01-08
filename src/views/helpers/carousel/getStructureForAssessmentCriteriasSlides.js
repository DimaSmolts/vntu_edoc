const getStructureForAssessmentCriteriasSlides = async () => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const data = await makeGetRequestAndReturnData({
		linkWithParams: `api/getLessonsAndExamingsStructure/?id=${wpId}`
	});

	return addAssessmentCriteriasSlides(data);
}