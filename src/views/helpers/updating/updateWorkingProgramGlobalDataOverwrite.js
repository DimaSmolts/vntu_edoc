const updateWorkingProgramGlobalDataOverwrite = (event, wpId) => {
    const postData = {
        wpId,
        field: event.target.name,
        value: event.target.value
    };

    makePostRequest({
        link: 'api/updateWorkingProgramGlobalDataOverwrite',
        postData
    });
}