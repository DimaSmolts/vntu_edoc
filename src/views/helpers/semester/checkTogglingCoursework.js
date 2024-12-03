const checkTogglingCoursework = (event, semesterId) => {
	if (event.target.checked) {
		toggleCoursework(event, semesterId);
	} else {
		openApproveDeletingModal('курсовий', () => toggleCoursework(event, semesterId), event.target);
	}
}