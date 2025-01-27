const deleteAllLessonsByType = async (event, lessonTypeName, semestersIds) => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

	const data = await makeDeleteRequestAndReturnData({
		linkWithParams: `api/deleteAllLessonsByType/?lessonTypeName=${lessonTypeName}&semestersIds=${semestersIds}&wpId=${wpId}`
	})

	if (data.status === 'success') {
		const addBtn = document.getElementById(`${lessonTypeName}AddBtn`);
		addBtn.disabled = false;

		const isSeminarAddBtnDisabled = document.getElementById("seminarAddBtn").disabled;
		const isPracticalAddBtnDisabled = document.getElementById("practicalAddBtn").disabled;
		const isLaboratoryAddBtnDisabled = document.getElementById("laboratoryAddBtn").disabled;

		getEducationalDisciplineStructureSlide(isSeminarAddBtnDisabled, isPracticalAddBtnDisabled, isLaboratoryAddBtnDisabled);
	} else {
		console.log('Failed to delete the theme.');
	}
}