const updateSelfworkTheme = (event, semesterId, selfworkId) => {
	const postData = {
		field: event.target.name,
		value: event.target.value,
		semesterId,
		selfworkId
	};

	makePostRequest({
		link: 'api/updateSelfworkTheme',
		postData
	});

}
