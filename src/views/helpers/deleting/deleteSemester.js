const deleteSemester = async (event, id) => {
	const data = await makeDeleteRequestAndReturnData({
		linkWithParams: `api/deleteSemester/?id=${id}`
	})

	if (data.status === 'success') {
		document.getElementById(`semesterBlock${id}`).remove();
	} else {
		console.log('Failed to delete the theme.');
	}
}