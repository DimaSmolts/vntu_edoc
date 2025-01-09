const updateWPInvolvedPerson = async (postData) => {
    const data = await makePostRequestAndReturnData({
        link: 'api/updateWPInvolvedPerson',
        postData
    })

    updateValidation();

    return data;
} 