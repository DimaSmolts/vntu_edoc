const selectNewHeadOfDepartment = async (wpInvolvedPersonId, personId, wpId) => {
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

    const degree = createLabelWithInput({
        labelText: 'Cтупінь:',
        inputType: 'text',
        inputName: 'degree',
        placeholder: 'к.т.н.',
        labelId: 'headOfDepartmentDegree',
        value: '',
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, newInvolvedPerson.id, wpId)
        }
    });

    const position = createLabelWithInput({
        labelText: 'Посада:',
        inputType: 'text',
        inputName: 'position',
        labelId: 'headOfDepartmentPosition',
        value: '',
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, newInvolvedPerson.id, wpId)
        }
    });

    const minutesOfMeeting = createLabelWithInput({
        labelText: 'Засідання:',
        inputType: 'text',
        inputName: 'minutesOfMeeting',
        labelId: 'headOfDepartmentMinutesOfMeeting',
        value: '',
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, newInvolvedPerson.id, wpId)
        }
    });

    const headOfDepartmentBlock = document.getElementById('headOfDepartmentBlock');
    headOfDepartmentBlock.classList.remove('involved-person-info-block');
    headOfDepartmentBlock.classList.add('involved-person-additional-info-block')

    headOfDepartmentBlock.appendChild(degree);
    headOfDepartmentBlock.appendChild(position);
    headOfDepartmentBlock.appendChild(minutesOfMeeting);
} 