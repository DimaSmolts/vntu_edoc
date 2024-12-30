const checkTogglingModuleTasks = (event, moduleId, titleName) => {
	if (event.target.checked) {
		toggleModuleTask(event, moduleId);
	} else {
		openApproveDeletingModal(titleName, () => toggleModuleTask(event, moduleId), event.target);
	}
}