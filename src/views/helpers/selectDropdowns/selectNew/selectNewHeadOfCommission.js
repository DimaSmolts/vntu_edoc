const selectNewHeadOfCommission = async (wpInvolvedPersonId, personId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 5,
    };

    const newInvolvedPerson = await updateWPInvolvedPerson(postData);

    const headOfCommissionSelect = document.getElementById('headOfCommissionSelect');
    headOfCommissionSelect.setAttribute('data-wpInvolvedPersonId', newInvolvedPerson.id);
    headOfCommissionSelect.setAttribute('data-headOfCommissionId', newInvolvedPerson.personId);

    const degree = createLabelWithInput({
        labelText: 'Cтупінь:',
        inputType: 'text',
        inputName: 'degree',
        placeholder: 'к.т.н.',
        labelId: 'headOfCommissionDegree',
        value: '',
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, newInvolvedPerson.id, wpId)
        }
    });

    const position = createLabelWithInput({
        labelText: 'Посада:',
        inputType: 'text',
        inputName: 'position',
        labelId: 'headOfCommissionPosition',
        value: '',
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, newInvolvedPerson.id, wpId)
        }
    });

    const minutesOfMeeting = createLabelWithInput({
        labelText: 'Засідання:',
        inputType: 'text',
        inputName: 'minutesOfMeeting',
        labelId: 'headOfCommissionMinutesOfMeeting',
        value: '',
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, newInvolvedPerson.id, wpId)
        }
    });

    const headOfCommissionBlock = document.getElementById('headOfCommissionBlock');
    headOfCommissionBlock.classList.remove('involved-person-info-block');
    headOfCommissionBlock.classList.add('involved-person-additional-info-block')

    headOfCommissionBlock.appendChild(degree);
    headOfCommissionBlock.appendChild(position);
    headOfCommissionBlock.appendChild(minutesOfMeeting);
} 