const toggleColloquium = (event, moduleId) => {
	const pointsInput = document.getElementById(`colloquiumPoint${moduleId}`);

	if (event.target.checked) {
		pointsInput.disabled = false;

		const postData = {
			id: moduleId,
			field: event.target.name,
			value: event.target.checked
		};

		fetch('updateModule', {
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
	} else {
		pointsInput.disabled = true;
		pointsInput.value = '';

		fetch(`deleteColloquium?moduleId=${moduleId}`, {
			method: 'DELETE',
			headers: {
				'Content-Type': 'application/json'
			}
		})
			.then(response => {
				if (!response.ok) {
					throw new Error('Network response was not ok');
				}
			})
			.catch(error => console.error('Post error:', error));
	}
}