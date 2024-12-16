const updateWorkingProgramGlobalDataOverwrite = (event, wpId) => {
    const postData = {
        wpId,
        field: event.target.name,
        value: event.target.value
    };

    fetch('api/updateWorkingProgramGlobalDataOverwrite', {
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