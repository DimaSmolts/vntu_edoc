const deleteSelfworkTheme = (event, id, semesterId) => {
	fetch(`api/deleteSelfworkTheme/?id=${id}&semesterId=${semesterId}`, {
		method: 'DELETE',
		headers: {
			'Content-Type': 'application/json'
		}
	})
		.then(response => response.json())
		.then(data => {
			if (data.status === 'success') {
				document.getElementById(`selfworkRow${id}`).remove();
			} else {
				console.log('Failed to delete the theme.');
			}
		})
		.catch(error => {
			console.error('Error:', error);
		});
}