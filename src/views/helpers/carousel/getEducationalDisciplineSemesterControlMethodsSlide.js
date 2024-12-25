const getEducationalDisciplineSemesterControlMethodsSlide = async () => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const response = await fetch(`api/getEducationalDisciplineSemesterControlMethodsContent/?id=${wpId}`, {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json'
		}
	})

	const data = await response.json();

	const educationalDisciplineSemesterControlMethodsContent = document.getElementById('educationalDisciplineSemesterControlMethodsContent');
	educationalDisciplineSemesterControlMethodsContent.innerHTML = data.educationalDisciplineSemesterControlMethodsContent;
}