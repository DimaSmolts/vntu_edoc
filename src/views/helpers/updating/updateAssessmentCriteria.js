const updateAssessmentCriteria = (event, wpId, lessonTypeId, taskTypeId) => {
    const postData = {
        wpId,
        field: event.target.name,
        value: event.target.value,
        lessonTypeId,
        taskTypeId
    };

    makePostRequest({
        link: 'api/updateAssessmentCriteria',
        postData
    });
}