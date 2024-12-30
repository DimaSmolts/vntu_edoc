const deleteAdditionalTask = (typeId, semesterId) => {
	fetch(`api/deleteIndividualTask?semesterId=${semesterId}&typeId=${typeId}`, {
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