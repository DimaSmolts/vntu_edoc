const updateGlobalWPDataForEducationalDiscipline = (event, wpId) => {
    const postData = {
        wpId,
        field: event.target.name,
        value: event.target.value
    };

    fetch('updateGlobalWPDataForEducationalDiscipline', {
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