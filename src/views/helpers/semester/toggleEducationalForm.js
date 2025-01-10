const toggleEducationalForm = async (event, educationalDisciplineSemesterId, educationalFormId) => {
	if (event.target.checked) {
		const postData = {
			educationalDisciplineSemesterId,
			educationalFormId
		};

		await makePostRequest({
			link: 'api/createSemesterEducationForm',
			postData
		});

	} else {
		await makeDeleteRequest({
			linkWithParams: `api/deleteSemesterEducationForm?educationalDisciplineSemesterId=${educationalDisciplineSemesterId}&educationalFormId=${educationalFormId}`
		})
	}

	await updateValidation();
}