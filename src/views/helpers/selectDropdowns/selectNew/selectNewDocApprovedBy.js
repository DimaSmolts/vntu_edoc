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

    const position = createLabelWithInput({
        labelText: 'Посада:',
        inputType: 'text',
        inputName: 'position',
        placeholder: 'Проректор з ...',
        value: '',
        labelId: "docApprovedByPosition",
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, newInvolvedPerson.id, wpId)
        }
    });

    const docApprovedByBlock = document.getElementById('docApprovedByBlock');
    docApprovedByBlock.classList.remove('doc-approved-by-info-block');
    docApprovedByBlock.classList.add('doc-approved-by-additional-info-block')

    docApprovedByBlock.appendChild(position);
} 