const toggleModuleTask = (event, moduleId) => {
	if (event.target.checked) {
		const postData = {
			moduleId,
			typeName: event.target.name,
		};

		fetch('api/createModuleTask', {
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
		fetch(`api/deleteModuleTask?moduleId=${moduleId}&type=${event.target.name}`, {
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