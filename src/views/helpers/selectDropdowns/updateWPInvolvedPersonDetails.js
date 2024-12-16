const updateWPInvolvedPersonDetails = (event, wpInvolvedPersonId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        field: event.target.name,
        value: event.target.value
    };

    fetch('updateWPInvolvedPersonDetails', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    })
} 