const updateLessonThemeInfo = (event, lessonThemeId) => {
    const postData = {
        id: lessonThemeId,
        field: event.target.name,
        value: event.target.value
    };

    fetch('updateLessonTheme', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
        })
        .catch(error => console.error('Post error:', error));
}