const createNewFieldOfStudy = async (wpId) => {
    const fieldOfStudyNameInput = document.getElementById('fieldOfStudyName');

    const postData = {
        wpId,
        fieldOfStudyName: fieldOfStudyNameInput.value
    };

    const data = await makePostRequestAndReturnData({
        link: 'api/createNewFieldOfStudy',
        postData
    })

    const fieldsOfStudyIdsSelect = document.querySelector(`#fieldsOfStudyIdsSelect`);
    const rawFieldsOfStudyIds = JSON.parse(fieldsOfStudyIdsSelect.getAttribute('data-fieldsOfStudyIds'));
    const updatedFieldsOfStudyIds = JSON.stringify([...rawFieldsOfStudyIds, data.fieldOfStudyId]);
    fieldsOfStudyIdsSelect.setAttribute('data-fieldsOfStudyIds', updatedFieldsOfStudyIds);

    fieldOfStudyNameInput.value = '';

    fieldOfStudySelectHandler(wpId, true);

    await updateValidation();
}