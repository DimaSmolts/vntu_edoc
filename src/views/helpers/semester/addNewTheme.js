const addNewTheme = async (moduleId) => {
	const postData = {
		moduleId
	};

	const data = await makePostRequestAndReturnData({
		link: 'api/createNewTheme',
		postData
	})
	
	return createThemeBlock(data.themeId);
}
