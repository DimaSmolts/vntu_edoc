const selectEducationalProgramGuarantor = async (wpInvolvedPersonId, personId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 3,
    };

    await updateWPInvolvedPerson(postData);
} 