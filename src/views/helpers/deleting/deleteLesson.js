const deleteLesson = async (event, id, container) => {
	const data = await makeDeleteRequestAndReturnData({
		linkWithParams: `api/deleteLesson/?id=${id}`
	})

	if (data.status === 'success') {
		document.getElementById(`lessonBlock${id}`).remove();

		if (!container.querySelector('.remove-lesson-btn')) {
			container.replaceChildren();
		}
	} else {
		console.log('Failed to delete the theme.');
	}
}