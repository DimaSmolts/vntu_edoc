const updateGeneralInfo = (event, id, isUpdateValidation) => {
    const url = new URL(window.location.href);
    const wpId = url.searchParams.get("id");

    const postData = {
        id: id ?? wpId,
        field: event.target.name,
        value: event.target.value == "" ? null : event.target.value
    };

    updateWP(postData, isUpdateValidation);
}