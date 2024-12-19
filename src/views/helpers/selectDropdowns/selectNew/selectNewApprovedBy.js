const selectNewApprovedBy = async (wpInvolvedPersonId, personId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 6,
    };

    const newInvolvedPerson = await updateWPInvolvedPerson(postData);

    const approvedBySelect = document.getElementById('approvedBySelect');
    approvedBySelect.setAttribute('data-wpInvolvedPersonId', newInvolvedPerson.id);
    approvedBySelect.setAttribute('data-approvedById', newInvolvedPerson.personId);

    const degree = createLabelWithInput({
        labelText: 'Cтупінь:',
        inputType: 'text',
        inputName: 'degree',
        placeholder: 'к.т.н.',
        labelId: 'approvedByDegree',
        value: '',
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, id, wpId)
        }
    });

    const position = createLabelWithInput({
        labelText: 'Посада:',
        inputType: 'text',
        inputName: 'position',
        labelId: 'approvedByPosition',
        value: '',
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, id, wpId)
        }
    });

    const minutesOfMeeting = createLabelWithInput({
        labelText: 'Протокол засідання:',
        inputType: 'text',
        inputName: 'minutesOfMeeting',
        labelId: 'approvedByMinutesOfMeeting',
        value: '',
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, id, wpId)
        }
    });

    const approvedByBlock = document.getElementById('approvedByBlock');
    approvedByBlock.classList.remove('involved-person-info-block');
    approvedByBlock.classList.add('involved-person-additional-info-block')

    approvedByBlock.appendChild(degree);
    approvedByBlock.appendChild(position);
    approvedByBlock.appendChild(minutesOfMeeting);
}


