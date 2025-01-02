const updateSelfworkHours = (event, educationalFormId, semesterId, selfworkId) => {
	const postData = {
		hours: event.target.value,
		educationalFormId,
		semesterId,
		selfworkId
	};

	fetch(`api/updateSelfworkHours`, {
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
