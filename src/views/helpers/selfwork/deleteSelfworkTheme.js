const deleteSelfworkTheme = async (event, id, semesterId) => {
	const data = await makeDeleteRequestAndReturnData({
		linkWithParams: `api/deleteSelfworkTheme/?id=${id}&semesterId=${semesterId}`
	})

	if (data.status === 'success') {
		updateValidation();
		document.getElementById(`selfworkRow${id}`).remove();
	} else {
		console.log('Failed to delete the theme.');
	}
}