const toggleEducationalForm = (event, educationalDisciplineSemesterId, educationalFormId) => {
	if (event.target.checked) {
		const postData = {
			educationalDisciplineSemesterId,
			educationalFormId
		};

		makePostRequest({
			link: 'api/createSemesterEducationForm',
			postData
		});
	} else {
		makeDeleteRequest({
			linkWithParams: `api/deleteSemesterEducationForm?educationalDisciplineSemesterId=${educationalDisciplineSemesterId}&educationalFormId=${educationalFormId}`
		})
	}
}