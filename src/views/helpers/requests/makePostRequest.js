const makePostRequest = ({
	link,
	postData,
	responseOKHandler = null
}) => {
	fetch(link, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(postData)
	})
		.then(async response => {
			if (!response.ok) {
				throw new Error('Network response was not ok');
			} else {
				if (responseOKHandler) {
					responseOKHandler();
				}

				if (debouncedHandleInput) {
					await debouncedHandleInput();
				}
			}
		})
		.catch(error => console.error('Post error:', error));
}