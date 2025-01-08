const updateHours = (event, lessonId, educationalFormId) => {
    const postData = {
        lessonId,
        educationalFormId,
        hours: event.target.value
    };

    makePostRequest({
        link: 'api/updateHours',
        postData
    });
}