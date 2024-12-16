const selectApprovedBy = async (wpInvolvedPersonId, personId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 6,
    };

    await updateWPInvolvedPerson(postData);
} 