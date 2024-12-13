const updateGeneralInfo = (event, id) => {
    const postData = {
        id,
        field: event.target.name,
        value: event.target.value ?? null
    };

    updateWP(postData);
}