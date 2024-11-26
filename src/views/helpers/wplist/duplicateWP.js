const duplicateWP = async (wpId) => {
    const postData = {
        wpId
    };

    const response = await fetch('duplicateWP', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    })

    const data = await response.json();

    return createNewListItem(data);
}