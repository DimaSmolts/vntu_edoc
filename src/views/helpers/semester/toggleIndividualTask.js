const toggleIndividualTask = (event, semesterId, linkedCheckbox = null) => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	if (event.target.checked) {
		const postData = {
			semesterId,
			typeName: event.target.name,
			wpId
		};

		if (linkedCheckbox) {
			linkedCheckbox.checked = false;
		}

		makePostRequest({
			link: 'api/createIndividualTask',
			postData
		});
	} else {
		makeDeleteRequest({
			linkWithParams: `api/deleteIndividualTask?semesterId=${semesterId}&type=${event.target.name}&wpId=${wpId}`
		})
	}
}