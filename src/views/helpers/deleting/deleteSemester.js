const deleteSemester = async (event, id) => {
	const data = await makeDeleteRequestAndReturnData({
		linkWithParams: `api/deleteSemester/?id=${id}`
	})

	if (data.status === 'success') {
		document.getElementById(`semesterBlock${id}`).remove();

		await updateValidation();

		const educationalDisciplineSemesterControlMethodsContent = document.getElementById('educationalDisciplineSemesterControlMethodsContent');

		const educationalDisciplineSemesterControlMethodsContentSemestersIds = JSON.parse(educationalDisciplineSemesterControlMethodsContent.getAttribute('data-semestersIds'));

		const updatedEducationalDisciplineSemesterControlMethodsContentSemestersIds = JSON.stringify(educationalDisciplineSemesterControlMethodsContentSemestersIds.filter(semesterId => Number(semesterId) !== Number(id)));
		educationalDisciplineSemesterControlMethodsContent.setAttribute('data-semestersIds', updatedEducationalDisciplineSemesterControlMethodsContentSemestersIds);

		const educationalDisciplineSemesterProgramContent = document.getElementById('educationalDisciplineSemesterProgram');

		const educationalDisciplineSemesterProgramContentSemestersIds = JSON.parse(educationalDisciplineSemesterProgramContent.getAttribute('data-semestersIds'));

		const updatedEducationalDisciplineSemesterProgramContentSemestersIds = JSON.stringify(educationalDisciplineSemesterProgramContentSemestersIds.filter(semesterId => Number(semesterId) !== Number(id)));
		educationalDisciplineSemesterProgramContent.setAttribute('data-semestersIds', updatedEducationalDisciplineSemesterProgramContentSemestersIds);
	} else {
		console.log('Failed to delete the theme.');
	}
}