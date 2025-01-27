const deleteLesson = async (event, id) => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const data = await makeDeleteRequestAndReturnData({
		linkWithParams: `api/deleteLesson/?id=${id}&wpId=${wpId}`
	})

	if (data.status === 'success') {
		document.getElementById(`lesson${id}`).remove();
	} else {
		console.log('Failed to delete the theme.');
	}
}