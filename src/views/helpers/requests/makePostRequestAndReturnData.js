const makePostRequestAndReturnData = async ({
	link,
	postData
}) => {
	const response = await fetch(link, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(postData)
	});

	const data = await response.json();

	if (debouncedHandleInput) {
		await debouncedHandleInput();
	}

	return data;
}