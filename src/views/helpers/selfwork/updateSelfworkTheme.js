const updateSelfworkTheme = (event, semesterId, selfworkId) => {
	const postData = {
		field: event.target.name,
		value: event.target.value,
		semesterId,
		selfworkId
	};

	fetch(`api/updateSelfworkTheme`, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(postData)
	})
		.then(response => {
			if (!response.ok) {
				throw new Error('Network response was not ok');
			} else {
				const nameCell = event.target.parentNode;
				const row = nameCell.parentNode;

				const hoursInputs = row.querySelectorAll('input[type="number"]');

				hoursInputs.forEach(input => {
					if (input.disabled) {
						input.placeholder = '';
						input.disabled = false;
					}
				});
			}
		})
		.catch(error => console.error('Post error:', error));
}
