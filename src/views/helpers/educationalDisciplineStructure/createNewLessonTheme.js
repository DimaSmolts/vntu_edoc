const createNewLessonTheme = async ({themeId, lessonTypeName}) => {
    const postData = {
        themeId,
        lessonTypeName
    };

    const response = await fetch('createNewLessonTheme', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    })

    const data = await response.json();

	console.log({ data })
    return createLessonsBlock({
        lessonTypeName,
        lessonThemeId: data.id
    });
}
