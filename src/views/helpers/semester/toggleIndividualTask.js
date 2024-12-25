const toggleIndividualTask = (event, semesterId) => {
	if (event.target.checked) {
		const postData = {
			id: semesterId,
			field: event.target.name,
			value: event.target.checked
		};

		fetch('api/updateSemester', {
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
		fetch(`api/deleteIndividualTask?semesterId=${semesterId}&type=${event.target.name}`, {
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