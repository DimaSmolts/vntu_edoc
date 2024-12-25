const checkTogglingIndividualTask = (event, semesterId, titleName) => {
	if (event.target.checked) {
		toggleIndividualTask(event, semesterId);
	} else {
		openApproveDeletingModal(titleName, () => toggleIndividualTask(event, semesterId), event.target);
	}
}