const updateWPInvolvedPerson = async (postData) => {
    const response = await fetch('api/updateWPInvolvedPerson', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    })

    const data = await response.json();

    return data.id;
} 