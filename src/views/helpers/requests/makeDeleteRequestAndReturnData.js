const makeDeleteRequestAndReturnData = async ({
	linkWithParams
}) => {
	const response = await fetch(linkWithParams, {
		method: 'DELETE',
		headers: {
			'Content-Type': 'application/json'
		}
	});

	const data = await response.json();

	if (debouncedHandleInput) {
		await debouncedHandleInput();
	}

	return data;
}