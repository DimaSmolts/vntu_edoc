const deleteWP = async (event, wpId) => {

	await makeDeleteRequest({
		linkWithParams: `api/deleteWP/?wpId=${wpId}`,
		isList: true
	})

	const container = event.target.parentNode;
	const item = container.parentNode;

	item.remove();
}