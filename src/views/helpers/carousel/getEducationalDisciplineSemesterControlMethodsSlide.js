const getEducationalDisciplineSemesterControlMethodsSlide = async () => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const data = await makeGetRequestAndReturnData({
		linkWithParams: `api/getEducationalDisciplineSemesterControlMethodsContent/?id=${wpId}`
	});

	const educationalDisciplineSemesterControlMethodsContent = document.getElementById('educationalDisciplineSemesterControlMethodsContent');
	educationalDisciplineSemesterControlMethodsContent.innerHTML = data.educationalDisciplineSemesterControlMethodsContent;

	const semestersIds = JSON.parse(educationalDisciplineSemesterControlMethodsContent.getAttribute('data-semestersIds'));

	semestersIds.forEach(semesterId => {
		additionalTaskSelectHandler(semesterId);
	});
}