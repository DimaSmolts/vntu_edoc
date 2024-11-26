const checkTogglingEducationalForm = (event, educationalDisciplineSemesterId, educationalFormId) => {
	if (event.target.checked) {
		toggleEducationalForm(event, educationalDisciplineSemesterId, educationalFormId);
	} else {
		openApproveDeletingModal('форму навчання', () => toggleEducationalForm(event, educationalDisciplineSemesterId, educationalFormId), event.target);
	}
}