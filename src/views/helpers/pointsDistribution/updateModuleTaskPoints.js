const updateModuleTaskPoints = (event, moduleId, taskTypeId) => {
    const postData = {
		points: event.target.value,
		moduleId,
		taskTypeId
	};

    makePostRequest({
        link: 'api/updateModuleTaskPoints',
        postData,
		responseOKHandler: updateValidation
    });
}