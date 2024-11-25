const getThemesForEducationalDisciplineStructure = () => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	fetch(`getThemes/?id=${wpId}`, {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json'
		}
	})
		.then(response => {
			if (!response.ok) {
				throw new Error('Network response was not ok');
			}

			return response.json();
		})
		.then(data => {
			createLessonsContainer(data.themes);
		})
		.catch(error => console.error('Post error:', error));
}