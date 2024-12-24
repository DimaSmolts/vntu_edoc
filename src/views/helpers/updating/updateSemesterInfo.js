const updateSemesterInfo = (event, semesterId) => {
    const postData = {
        id: semesterId,
        field: event.target.name,
        value: event.target.value == "" ? null : event.target.value
    };

    fetch('api/updateSemester', {
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