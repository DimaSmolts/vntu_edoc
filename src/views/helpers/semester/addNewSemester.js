const addNewSemester = async (wpId, educationalForms) => {
	const postData = {
		wpId
	};

	const data = await makePostRequestAndReturnData({
		link: 'api/createNewSemester',
		postData
	})

	return createSemesterContainer(data.semesterId, educationalForms);
}
