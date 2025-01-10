const addNewModule = async (semesterId) => {
	const postData = {
		semesterId
	};

	const data = await makePostRequestAndReturnData({
		link: 'api/createNewModule',
		postData
	})

	updateValidation();

	const educationalDisciplineSemesterProgramContent = document.getElementById('educationalDisciplineSemesterProgram');

	const educationalDisciplineSemesterProgramContentModulesIds = JSON.parse(educationalDisciplineSemesterProgramContent.getAttribute('data-modulesIds'));

	const updatedEducationalDisciplineSemesterProgramContentModulesIds = JSON.stringify([...educationalDisciplineSemesterProgramContentModulesIds, data.moduleId]);
	educationalDisciplineSemesterProgramContent.setAttribute('data-modulesIds', updatedEducationalDisciplineSemesterProgramContentModulesIds);

	return createModuleBlock(data.moduleId);
}
