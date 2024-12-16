const selectNewHeadOfDepartment = async (wpInvolvedPersonId, personId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 4,
    };

    const id = await updateWPInvolvedPerson(postData);

    const headOfDepartmentSelect = document.getElementById('headOfDepartmentSelect');
    headOfDepartmentSelect.setAttribute('data-wpInvolvedPersonId', id);

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
    const positionAndMinutesOfMeetingTextEditor = createElement({ elementName: 'div', id: 'headOfDepartmentPosition', style: "height: 100px" })

    const headOfDepartmentLabel = document.getElementById('headOfDepartmentLabel');

    headOfDepartmentLabel.after(degree);
    degree.after(positionAndMinutesOfMeetingLabel);
    positionAndMinutesOfMeetingLabel.after(positionAndMinutesOfMeetingTextEditor);

    headOfDepartmentPosition({ headOfDepartmentId: id, headOfDepartmentPositionName: '', wpId })
} 