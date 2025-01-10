const deleteModule = async (event, id) => {
	const data = await makeDeleteRequestAndReturnData({
		linkWithParams: `api/deleteModule/?id=${id}`
	})

	if (data.status === 'success') {
		document.getElementById(`moduleBlock${id}`).remove();

		await updateValidation();

		const educationalDisciplineSemesterProgramContent = document.getElementById('educationalDisciplineSemesterProgram');

		const educationalDisciplineSemesterProgramContentModulesIds = JSON.parse(educationalDisciplineSemesterProgramContent.getAttribute('data-modulesIds'));

		const updatedEducationalDisciplineSemesterProgramContentModulesIds = JSON.stringify(educationalDisciplineSemesterProgramContentModulesIds.filter(moduleId => Number(moduleId) !== Number(id)));
		educationalDisciplineSemesterProgramContent.setAttribute('data-modulesIds', updatedEducationalDisciplineSemesterProgramContentModulesIds);
	} else {
		console.log('Failed to delete the theme.');
	}
}