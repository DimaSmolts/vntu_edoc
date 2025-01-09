const updateGeneralInfo = (event, id, isUpdateValidation) => {
    const postData = {
        id,
        field: event.target.name,
        value: event.target.value == "" ? null : event.target.value
    };

    updateWP(postData, isUpdateValidation);
}