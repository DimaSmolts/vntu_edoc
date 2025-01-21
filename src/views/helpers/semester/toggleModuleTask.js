const toggleModuleTask = (event, moduleId) => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	if (event.target.checked) {
		const postData = {
			moduleId,
			typeName: event.target.name,
			wpId
		};

		makePostRequest({
			link: 'api/createModuleTask',
			postData
		});
	} else {
		makeDeleteRequest({
			linkWithParams: `api/deleteModuleTask?moduleId=${moduleId}&type=${event.target.name}&wpId=${wpId}`
		})
	}
}