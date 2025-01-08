const duplicateWP = async (wpId) => {
    const postData = {
        wpId
    };

	const data = await makePostRequestAndReturnData({
		link: 'api/duplicateWP',
		postData
	})

    return createNewListItem(data);
}