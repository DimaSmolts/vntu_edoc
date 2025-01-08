const updateLessonInfo = (event, lessonId) => {
    const postData = {
        id: lessonId,
        field: event.target.name,
        value: event.target.value
    };

    makePostRequest({
        link: 'api/updateLesson',
        postData
    });
}