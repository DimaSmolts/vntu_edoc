const checkTogglingColloquium = (event, moduleId) => {
	if (event.target.checked) {
		toggleColloquium(event, moduleId);
	} else {
		openApproveDeletingModal('колоквіум', () => toggleColloquium(event, moduleId), event.target);
	}
}