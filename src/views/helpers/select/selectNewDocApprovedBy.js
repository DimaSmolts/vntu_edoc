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
    const positionAndMinutesOfMeetingTextEditor = createElement({ elementName: 'div', id: 'docApprovedByPosition', style: "height: 100px" })

    const docApprovedByLabel = document.getElementById('docApprovedByLabel');

    docApprovedByLabel.after(degree);
    degree.after(positionAndMinutesOfMeetingLabel);
    positionAndMinutesOfMeetingLabel.after(positionAndMinutesOfMeetingTextEditor);

    docApprovedByPosition({ docApprovedById: id, docApprovedByPositionName: '', wpId })
} 