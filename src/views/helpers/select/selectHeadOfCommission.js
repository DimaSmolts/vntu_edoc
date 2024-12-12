const selectHeadOfCommission = async (wpInvolvedPersonId, personId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 5,
    };

    await updateWPInvolvedPerson(postData);
} 