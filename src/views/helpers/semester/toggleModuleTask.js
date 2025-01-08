const toggleModuleTask = (event, moduleId) => {
	if (event.target.checked) {
		const postData = {
			moduleId,
			typeName: event.target.name,
		};

		makePostRequest({
			link: 'api/createModuleTask',
			postData
		});
	} else {
		makeDeleteRequest({
			linkWithParams: `api/deleteModuleTask?moduleId=${moduleId}&type=${event.target.name}`
		})
	}
}