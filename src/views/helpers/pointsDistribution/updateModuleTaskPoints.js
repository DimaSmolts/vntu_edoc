const updateModuleTaskPoints = (event, moduleId, taskTypeId) => {
    const postData = {
		points: event.target.value,
		moduleId,
		taskTypeId
	};

	fetch(`api/updateModuleTaskPoints`, {
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