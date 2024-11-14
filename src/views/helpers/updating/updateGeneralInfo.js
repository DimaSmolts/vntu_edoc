const updateGeneralInfo = (event, id) => {
    const postData = {
        id,
        field: event.target.name,
        value: event.target.value
    };

    updateWP(postData);
}