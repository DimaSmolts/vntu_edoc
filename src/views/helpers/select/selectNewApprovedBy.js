const selectNewApprovedBy = async (wpInvolvedPersonId, personId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 4,
    };

    const id = await updateWPInvolvedPerson(postData);

    const approvedBySelect = document.getElementById('approvedBySelect');
    approvedBySelect.setAttribute('data-wpInvolvedPersonId', id);

    const degree = createLabelWithInput({
        labelText: 'Cтупінь:',
        inputType: 'text',
        inputName: 'degree',
        placeholder: 'к.т.н.',
        value: '',
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, id, wpId)
        }
    });

    const positionAndMinutesOfMeetingLabel = createElement({ elementName: "p", innerText: 'Посада. Протокол засідання:' });
    const positionAndMinutesOfMeetingTextEditor = createElement({ elementName: 'div', id: 'approvedByPosition', style: "height: 100px" })

    const approvedByLabel = document.getElementById('approvedByLabel');

    approvedByLabel.after(degree);
    degree.after(positionAndMinutesOfMeetingLabel);
    positionAndMinutesOfMeetingLabel.after(positionAndMinutesOfMeetingTextEditor);

    approvedByPosition({ approvedById: id, approvedByPositionName: '', wpId })
} 