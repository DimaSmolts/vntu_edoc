const toggleEducationalForm = (event, educationalDisciplineSemesterId, educationalFormId) => {
	if (event.target.checked) {
		console.log('here');
		const postData = {
			educationalDisciplineSemesterId,
			educationalFormId
		};

		fetch('createSemesterEducationForm', {
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
		fetch(`deleteSemesterEducationForm?educationalDisciplineSemesterId=${educationalDisciplineSemesterId}&educationalFormId=${educationalFormId}`, {
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