const deleteSemester = async (event, id) => {
	const data = await makeDeleteRequestAndReturnData({
		linkWithParams: `api/deleteSemester/?id=${id}`
	})

	if (data.status === 'success') {
		document.getElementById(`semesterBlock${id}`).remove();

		const educationalDisciplineSemesterControlMethodsContent = document.getElementById('educationalDisciplineSemesterControlMethodsContent');

		const semestersIds = JSON.parse(educationalDisciplineSemesterControlMethodsContent.getAttribute('data-semestersIds'));
	
		const updatedSemestersIds = JSON.stringify(semestersIds.filter(semesterId => Number(semesterId) !== Number(id)));
		educationalDisciplineSemesterControlMethodsContent.setAttribute('data-semestersIds', updatedSemestersIds);

		updateValidation();
	} else {
		console.log('Failed to delete the theme.');
	}
}