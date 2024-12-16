const selectNewHeadOfCommission = async (wpInvolvedPersonId, personId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 5,
    };

    const id = await updateWPInvolvedPerson(postData);

    const headOfCommissionSelect = document.getElementById('headOfCommissionSelect');
    headOfCommissionSelect.setAttribute('data-wpInvolvedPersonId', id);

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
    const positionAndMinutesOfMeetingTextEditor = createElement({ elementName: 'div', id: 'headOfCommissionPosition', style: "height: 100px" })

    const headOfCommissionLabel = document.getElementById('headOfCommissionLabel');

    headOfCommissionLabel.after(degree);
    degree.after(positionAndMinutesOfMeetingLabel);
    positionAndMinutesOfMeetingLabel.after(positionAndMinutesOfMeetingTextEditor);

    headOfCommissionPosition({ headOfCommissionId: id, headOfCommissionPositionName: '', wpId })
} 