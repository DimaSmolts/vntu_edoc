const selectNewDocApprovedBy = async (wpInvolvedPersonId, personId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 1,
    };

    const newInvolvedPerson = await updateWPInvolvedPerson(postData);

    const docApprovedBySelect = document.getElementById('docApprovedBySelect');
    docApprovedBySelect.setAttribute('data-wpInvolvedPersonId', newInvolvedPerson.id);

    const positionLabel = createLabelWithInput({
        labelText: 'Посада:',
        inputType: 'text',
        inputName: 'position',
        placeholder: 'Проректор з ...',
        value: '',
        labelId: "docApprovedByPosition",
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, id, wpId)
        }
    });

    const docApprovedByLabel = document.getElementById('docApprovedByLabel');

    docApprovedByLabel.after(positionLabel);
} 