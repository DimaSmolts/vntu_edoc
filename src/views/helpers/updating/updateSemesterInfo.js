const updateSemesterInfo = (event, semesterId) => {
    const postData = {
        id: semesterId,
        field: event.target.name,
        value: event.target.value == "" ? null : event.target.value
    };

    makePostRequest({
        link: 'api/updateSemester',
        postData
    });
}