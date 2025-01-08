const updateWPInvolvedPersonDetails = (event, wpInvolvedPersonId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        field: event.target.name,
        value: event.target.value
    };

    makePostRequest({
        link: 'api/updateWPInvolvedPersonDetails',
        postData
    });
} 