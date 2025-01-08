const updateSemesterPointsDistribution = (postData) => {
    makePostRequest({
        link: 'api/updateSemester',
        postData,
		responseOKHandler: updateValidation
    });
}