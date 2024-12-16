const selectHeadOfDepartment = async (wpInvolvedPersonId, personId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 4,
    };

    await updateWPInvolvedPerson(postData);
} 