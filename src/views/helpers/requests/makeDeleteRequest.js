const makeDeleteRequest = ({
	linkWithParams,
	responseOKHandler = null,
	isList = false
}) => {
	fetch(linkWithParams, {
		method: 'DELETE',
		headers: {
			'Content-Type': 'application/json'
		}
	})
		.then(async response => {
			if (!response.ok) {
				throw new Error('Network response was not ok');
			} else {
				if (!isList) {
					if (responseOKHandler) {
						responseOKHandler();
					}

					if (debouncedHandleInput) {
						await debouncedHandleInput();
					}
				}
			}
		})
		.catch(error => console.error('Post error:', error));
}