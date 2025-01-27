const createNewLesson = async (
    semesterId,
    semesterIdx,
    lessonTypeName,
    semesterEducationalForms,
    educationalFormsInSemesters
) => {
    const url = new URL(window.location.href);
    const wpId = url.searchParams.get("id");

    const postData = {
        semesterId,
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
        semesterIdx
    });
}
