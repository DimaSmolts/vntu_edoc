const updateWPLiterature = (event, wpId, name, value, ) => {
    const postData = {
        wpId,
        field: event.target.name ?? name,
        value: event.target.value ?? value
    };

    fetch('updateWPLiterature', {
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