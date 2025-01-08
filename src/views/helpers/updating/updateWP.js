const updateWP = (postData) => {
    makePostRequest({
        link: 'api/updateWPDetails',
        postData
    });
}