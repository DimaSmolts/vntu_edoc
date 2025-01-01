const updateLessonSelfworkHours = (event, lessonTypeId, educationalFormId, semesterId) => {
	const postData = {
		hours: event.target.value,
		lessonTypeId,
		educationalFormId,
		semesterId
	};

	fetch(`api/updateLessonSelfworkHours`, {
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
}