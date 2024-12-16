const selectCreatedBy = (wpInvolvedPersonId, personId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 2
    };

    updateWPInvolvedPerson(postData);
} 