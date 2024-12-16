const addNewTheme = async (moduleId) => {
	const postData = {
		moduleId
	};

	const response = await fetch('api/createNewTheme', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(postData)
	})

	const data = await response.json();
	
	return createThemeBlock(data.themeId);
}
