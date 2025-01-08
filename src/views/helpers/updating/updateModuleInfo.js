const updateModuleInfo = (event, moduleId) => {
    const postData = {
        id: moduleId,
        field: event.target.name,
        value: event.target.value
    };

    makePostRequest({
        link: 'api/updateModule',
        postData
    });
}