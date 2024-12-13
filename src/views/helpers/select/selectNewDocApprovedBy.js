const selectNewDocApprovedBy = async (wpInvolvedPersonId, personId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 1,
    };

    const id = await updateWPInvolvedPerson(postData);

    const docApprovedBySelect = document.getElementById('docApprovedBySelect');
    docApprovedBySelect.setAttribute('data-wpInvolvedPersonId', id);

    const positionAndMinutesOfMeetingLabel = createLabelWithInput({
        labelText: 'Посада:',
        inputType: 'text',
        inputName: 'positionAndMinutesOfMeeting',
        placeholder: 'Проректор з ...',
        value: '',
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, id, wpId)
        }
    });

    const docApprovedByLabel = document.getElementById('docApprovedByLabel');

    docApprovedByLabel.after(positionAndMinutesOfMeetingLabel);

    docApprovedByPosition({ docApprovedById: id, docApprovedByPositionName: '', wpId })
} 