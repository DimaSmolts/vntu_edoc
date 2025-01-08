const getThemesForEducationalDisciplineStructure = async () => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const data = await makeGetRequestAndReturnData({
		linkWithParams: `api/getThemes/?id=${wpId}`
	});
	
	createLessonsContainer(data.themes);
}