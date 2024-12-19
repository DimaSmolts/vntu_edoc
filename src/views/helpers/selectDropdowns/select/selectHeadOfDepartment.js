const selectHeadOfDepartment = async (wpInvolvedPersonId, personId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 4,
    };

    const newInvolvedPerson = await updateWPInvolvedPerson(postData);

    const headOfDepartmentSelect = document.getElementById('headOfDepartmentSelect');
    headOfDepartmentSelect.setAttribute('data-wpInvolvedPersonId', newInvolvedPerson.id);
    headOfDepartmentSelect.setAttribute('data-headOfDepartmentId', newInvolvedPerson.personId);
} 