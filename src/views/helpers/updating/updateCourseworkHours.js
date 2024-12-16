const updateCourseworkHours = (event, semesterId, educationalFormId) => {
    const postData = {
        semesterId,
        educationalFormId,
        hours: event.target.value
    };

    fetch('api/updateCourseworkHours', {
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