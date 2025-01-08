const makeDeleteRequest = ({
	linkWithParams,
	responseOKHandler = null
}) => {
	fetch(linkWithParams, {
		method: 'DELETE',
		headers: {
			'Content-Type': 'application/json'
		}
	})
		.then(response => {
			if (!response.ok) {
				throw new Error('Network response was not ok');
			} else {
				if (responseOKHandler) {
					responseOKHandler();
				}

				if (debouncedHandleInput) {
					debouncedHandleInput();
				}
			}
		})
		.catch(error => console.error('Post error:', error));
}