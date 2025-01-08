const updateWPLiterature = (wpId, name, value,) => {
    const postData = {
        wpId,
        field: name,
        value: value
    };

    makePostRequest({
        link: 'api/updateWPLiterature',
        postData
    });
}