const deleteModule = async (event, id) => {
	const data = await makeDeleteRequestAndReturnData({
		linkWithParams: `api/deleteModule/?id=${id}`
	})

	if (data.status === 'success') {
		document.getElementById(`moduleBlock${id}`).remove();
	} else {
		console.log('Failed to delete the theme.');
	}
}