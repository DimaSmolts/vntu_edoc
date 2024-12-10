const updateWPInvolvedPersonDetails = async (event, wpInvolvedPersonId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        field: event.target.name,
        value: event.target.value 
    };

    const result = await fetch('updateWPInvolvedPersonDetails', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    })

    const data = result.json();

    
} 