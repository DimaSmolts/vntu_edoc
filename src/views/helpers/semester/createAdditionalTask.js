const createAdditionalTask = (typeId, semesterId) => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const postData = {
		semesterId,
		typeId,
        wpId
	};

	
	makePostRequest({
		link: 'api/createIndividualTask',
		postData,
	});
}