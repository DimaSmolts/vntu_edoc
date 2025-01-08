const addNewModule = async (semesterId) => {
	const postData = {
		semesterId
	};

	const data = await makePostRequestAndReturnData({
        link: 'api/createNewModule',
        postData
    })
	
	return createModuleBlock(data.moduleId);
}
