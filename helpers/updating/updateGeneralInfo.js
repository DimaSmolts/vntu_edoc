const updateGeneralInfo = (event) => {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');

    const postData = {
        id,
        field: event.target.name,
        value: event.target.value
    };

    updateWP(postData);
}