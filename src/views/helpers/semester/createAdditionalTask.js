const createAdditionalTask = (typeId, semesterId) => {
	const postData = {
		semesterId,
		typeId,
	};

	fetch('api/createIndividualTask', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(postData)
	})
		.then(response => {
			if (!response.ok) {
				throw new Error('Network response was not ok');
			}
		})
		.catch(error => console.error('Post error:', error));
}