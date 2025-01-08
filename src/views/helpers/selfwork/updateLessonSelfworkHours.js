const updateLessonSelfworkHours = ({
	event,
	lessonTypeId,
	educationalFormId,
	semesterId,
}) => {
	const postData = {
		hours: event.target.value,
		lessonTypeId,
		educationalFormId,
		semesterId
	};

    makePostRequest({
        link: 'api/updateLessonSelfworkHours',
        postData,
		responseOKHandler: updateValidation
    });
}