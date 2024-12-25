const checkTogglingControlWork = (event, moduleId) => {
	if (event.target.checked) {
		toggleControlWork(event, moduleId);
	} else {
		openApproveDeletingModal('контрольну роботу', () => toggleControlWork(event, moduleId), event.target);
	}
}