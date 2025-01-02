const addNewSelfworkTheme = async (semesterId, educationalForms) => {
	const postData = {
		semesterId
	};

	const response = await fetch('api/createNewSelfworkTheme', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(postData)
	})

	const data = await response.json();

	return addNewSelfworkThemeRow(
		semesterId,
		educationalForms,
		data.id
	);
}