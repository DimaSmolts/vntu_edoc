const createNewLesson = async (
    moduleId,
    idx,
    lessonTypeName,
    semesterEducationalForms,
    educationalFormsInSemesters
) => {
    const url = new URL(window.location.href);
    const wpId = url.searchParams.get("id");

    const postData = {
        moduleId,
        lessonTypeName,
        wpId
    };

    const data = await makePostRequestAndReturnData({
        link: 'api/createNewLesson',
        postData
    })

    return createLessonRow({
        lessonTypeName,
        lessonId: data.lessonId,
        semesterEducationalForms,
        educationalFormsInSemesters,
        idx
    });
}
