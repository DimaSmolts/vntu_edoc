const updateGlobalData = (event) => {
    const postData = {
        field: event.target.name,
        value: event.target.value
    };

    makePostRequest({
        link: 'api/updateGlobalData',
        postData
    });
}