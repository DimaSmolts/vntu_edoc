const makeGetRequestAndReturnData = async ({
	linkWithParams
}) => {
	const response = await fetch(linkWithParams, {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json'
		}
	});

	const data = await response.json();

	return data;
}