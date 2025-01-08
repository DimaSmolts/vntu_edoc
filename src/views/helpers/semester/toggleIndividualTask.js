const toggleIndividualTask = (event, semesterId, linkedCheckbox = null) => {
	if (event.target.checked) {
		const postData = {
			semesterId,
			typeName: event.target.name,
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
			linkWithParams: `api/deleteIndividualTask?semesterId=${semesterId}&type=${event.target.name}`
		})
	}
}