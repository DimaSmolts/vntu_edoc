const selectDocApprovedBy = async (wpInvolvedPersonId, personId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 1,
    };

    await updateWPInvolvedPerson(postData);
} 