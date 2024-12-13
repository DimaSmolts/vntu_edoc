const updateGeneralInfo = (event, id) => {
    const postData = {
        id,
        field: event.target.name,
        value: event.target.value == "" ? null : event.target.value
    };

    updateWP(postData);
}