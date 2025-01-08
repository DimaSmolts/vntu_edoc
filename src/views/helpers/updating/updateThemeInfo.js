const updateThemeInfo = (event, themeId) => {
    const postData = {
        id: themeId,
        field: event.target.name,
        value: event.target.value
    };

    makePostRequest({
        link: 'api/updateTheme',
        postData
    });
}