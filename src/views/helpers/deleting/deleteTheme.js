const deleteTheme = async (event, id) => {
	const data = await makeDeleteRequestAndReturnData({
		linkWithParams: `api/deleteTheme/?id=${id}`
	})

	if (data.status === 'success') {
		document.getElementById(`themeBlock${id}`).remove();
	} else {
		console.log('Failed to delete the theme.');
	}
}