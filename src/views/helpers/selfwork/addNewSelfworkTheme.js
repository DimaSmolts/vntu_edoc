const addNewSelfworkTheme = async (semesterId, educationalForms) => {
	const postData = {
		semesterId
	};

	const data = await makePostRequestAndReturnData({
        link: 'api/createNewSelfworkTheme',
        postData
    })

	return addNewSelfworkThemeRow(
		semesterId,
		educationalForms,
		data.id
	);
}