const createNewLesson = async ({ themeId, lessonTypeName, semesterEducationalForms, container }) => {
    const postData = {
        themeId,
        lessonTypeName
    };

    const data = await makePostRequestAndReturnData({
        link: 'api/createNewLesson',
        postData
    })

    return createLessonsBlock({
        lessonTypeName,
        lessonId: data.lessonId,
        semesterEducationalForms,
        container
    });
}
