const deleteTheme = (event, id) => {
	fetch(`api/deleteTheme/?id=${id}`, {
		method: 'DELETE',
		headers: {
			'Content-Type': 'application/json'
		}
	})
		.then(response => response.json())
		.then(data => {
			if (data.status === 'success') {
				document.getElementById(`themeBlock${id}`).remove();
			} else {
				console.log('Failed to delete the theme.');
			}
		})
		.catch(error => {
			console.error('Error:', error);
		});
}