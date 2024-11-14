const addNewSemecter = (wpId) => {
	const postData = {
		wpId
	};

	fetch('createNewSemester', {
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
			return response.json();
		})
		.then(data => {
			createSemesterContainer(data.semesterId);
		})
		.catch(error => console.error('Post error:', error));
}
