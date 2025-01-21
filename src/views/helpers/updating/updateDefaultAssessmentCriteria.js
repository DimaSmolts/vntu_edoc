const updateDefaultAssessmentCriteria = (event, lessonTypeId, taskTypeId, isGeneral = null, isAdditionalTask = null) => {
    const postData = {
        wpId: null,
        field: event.target.name,
        value: event.target.value,
        lessonTypeId,
        taskTypeId,
        isGeneral,
        isAdditionalTask
    };

    makePostRequest({
        link: 'api/updateDefaultAssessmentCriteria',
        postData,
        isGlobal: true
    });
}