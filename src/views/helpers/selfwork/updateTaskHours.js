const updateTaskHours = (event, educationalFormId, taskDetailsId, semesterId) => {
	const postData = {
		hours: event.target.value,
		educationalFormId,
		taskDetailsId,
		semesterId
	};

	fetch(`api/updateTaskHours`, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(postData)
	})
		.then(response => {
			if (!response.ok) {
				throw new Error('Network response was not ok');
			} else {
				updateValidation();
			}
		})
		.catch(error => console.error('Post error:', error));
}