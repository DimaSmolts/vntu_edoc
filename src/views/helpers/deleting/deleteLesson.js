const deleteLesson = async (event, id, container) => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const data = await makeDeleteRequestAndReturnData({
		linkWithParams: `api/deleteLesson/?id=${id}&wpId=${wpId}`
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