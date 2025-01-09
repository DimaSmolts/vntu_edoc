const updateWP = (postData, isUpdateValidation) => {
    makePostRequest({
        link: 'api/updateWPDetails',
        postData,
		responseOKHandler: isUpdateValidation ? updateValidation : null
    });
}