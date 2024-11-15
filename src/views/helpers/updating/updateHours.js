const updateHours = (event, lessonThemeId, educationalFormId) => {
    const postData = {
        lessonThemeId,
        educationalFormId,
        hours: event.target.value
    };

    fetch('updateHours', {
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