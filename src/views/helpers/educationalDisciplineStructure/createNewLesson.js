const createNewLesson = async ({themeId, lessonTypeName, semesterEducationalForms}) => {
    const postData = {
        themeId,
        lessonTypeName
    };

    const response = await fetch('createNewLesson', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    })

    const data = await response.json();

    return createLessonsBlock({
        lessonTypeName,
        lessonId: data.lessonId,
        semesterEducationalForms
    });
}
