const updateTaskHours = (event, educationalFormId, taskDetailsId, semesterId) => {
	const postData = {
		hours: event.target.value,
		educationalFormId,
		taskDetailsId,
		semesterId
	};
	
	makePostRequest({
		link: 'api/updateTaskHours',
		postData,
		responseOKHandler: updateValidation
	});
}