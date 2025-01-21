const createNewLesson = async ({ themeId, lessonTypeName, semesterEducationalForms, container }) => {
	const url = new URL(window.location.href);
	const wpId = url.searchParams.get("id");

    const postData = {
        themeId,
        lessonTypeName,
        wpId
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
