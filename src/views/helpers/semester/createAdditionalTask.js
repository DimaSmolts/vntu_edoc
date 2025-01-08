const createAdditionalTask = (typeId, semesterId) => {
	const postData = {
		semesterId,
		typeId,
	};

	
	makePostRequest({
		link: 'api/createIndividualTask',
		postData,
	});
}