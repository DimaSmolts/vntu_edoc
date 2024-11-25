const updateLessonInfo = (event, lessonId) => {
    const postData = {
        id: lessonId,
        field: event.target.name,
        value: event.target.value
    };

    fetch('updateLesson', {
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