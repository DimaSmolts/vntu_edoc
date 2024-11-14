const addNewModule = async (semesterId) => {
	const postData = {
		semesterId
	};

	const response = await fetch('createNewModule', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(postData)
	})

	const data = await response.json();
	
	return createModuleBlock(data.moduleId);
}
