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

	const semestersIds = JSON.parse(educationalDisciplineSemesterControlMethodsContent.getAttribute('data-semestersIds'));

    const updatedSemestersIds = JSON.stringify([...semestersIds, data.semesterId]);
    educationalDisciplineSemesterControlMethodsContent.setAttribute('data-semestersIds', updatedSemestersIds);

	return createSemesterContainer(data.semesterId, educationalForms);
}
