const deleteLesson = (event, id, container) => {
	fetch(`deleteLesson/?id=${id}`, {
		method: 'DELETE',
		headers: {
			'Content-Type': 'application/json'
		}
	})
		.then(response => response.json())
		.then(data => {
			if (data.status === 'success') {
				document.getElementById(`lessonBlock${id}`).remove();

				if (!container.querySelector('.remove-lesson-btn')) {
					container.replaceChildren();
				}
			} else {
				console.log('Failed to delete the theme.');
			}
		})
		.catch(error => {
			console.error('Error:', error);
		});
}