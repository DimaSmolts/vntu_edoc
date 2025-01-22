const makePostRequestAndReturnData = async ({
	link,
	postData,
	isList = false
}) => {
	const response = await fetch(link, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(postData)
	});

	const data = await response.json();

	if (!isList && debouncedHandleInput) {
		await debouncedHandleInput();
	}

	return data;
}