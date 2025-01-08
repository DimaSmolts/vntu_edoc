const updateSelfworkHours = ({
	event,
	educationalFormId,
	semesterId,
	selfworkId,
}) => {
	const postData = {
		hours: event.target.value,
		educationalFormId,
		semesterId,
		selfworkId
	};

	makePostRequest({
		link: 'api/updateSelfworkHours',
		postData,
		responseOKHandler: updateValidation
	});
}
