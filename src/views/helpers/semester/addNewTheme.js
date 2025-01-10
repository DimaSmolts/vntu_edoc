const addNewTheme = async (moduleId) => {
	const postData = {
		moduleId
	};

	const data = await makePostRequestAndReturnData({
		link: 'api/createNewTheme',
		postData
	})

	updateValidation();
	
	return createThemeBlock(data.themeId);
}
