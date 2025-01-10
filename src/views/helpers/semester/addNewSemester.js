const addNewSemester = async (wpId, educationalForms) => {
	const postData = {
		wpId
	};

	const data = await makePostRequestAndReturnData({
		link: 'api/createNewSemester',
		postData
	})

	updateValidation();

	const educationalDisciplineSemesterControlMethodsContent = document.getElementById('educationalDisciplineSemesterControlMethodsContent');

	const educationalDisciplineSemesterControlMethodsContentSemestersIds = JSON.parse(educationalDisciplineSemesterControlMethodsContent.getAttribute('data-semestersIds'));

	const updatedEducationalDisciplineSemesterControlMethodsContentSemestersIds = JSON.stringify([...educationalDisciplineSemesterControlMethodsContentSemestersIds, data.semesterId]);
	educationalDisciplineSemesterControlMethodsContent.setAttribute('data-semestersIds', updatedEducationalDisciplineSemesterControlMethodsContentSemestersIds);

	const educationalDisciplineSemesterProgramContent = document.getElementById('educationalDisciplineSemesterProgram');

	const educationalDisciplineSemesterProgramContentSemestersIds = JSON.parse(educationalDisciplineSemesterProgramContent.getAttribute('data-semestersIds'));

	const updatedEducationalDisciplineSemesterProgramContentSemestersIds = JSON.stringify([...educationalDisciplineSemesterProgramContentSemestersIds, data.semesterId]);
	educationalDisciplineSemesterProgramContent.setAttribute('data-semestersIds', updatedEducationalDisciplineSemesterProgramContentSemestersIds);

	return createSemesterContainer(data.semesterId, educationalForms);
}
