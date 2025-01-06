const updateTaskPoints = async (event, semesterId, taskDetailsId, additionalTasks = []) => {
	// Оновлюємо значення в БД
	const postData = {
		points: event.target.value,
		semesterId,
		taskDetailsId
	};

	await fetch(`api/updateTaskPointsById`, {
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

	// Оновлюємо Усього за модуль для семестра
	updateTotalBySemesterCell(semesterId, additionalTasks);

	// Оновлюємо Всього для семестра
	updateFullTotalBySemesterCell(semesterId);
}