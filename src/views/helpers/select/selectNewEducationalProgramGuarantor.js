const selectNewEducationalProgramGuarantor = async (wpInvolvedPersonId, personId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 3,
    };

    const id = await updateWPInvolvedPerson(postData);

    const educationalProgramGuarantorSelect = document.getElementById('educationalProgramGuarantorSelect');
    educationalProgramGuarantorSelect.setAttribute('data-wpInvolvedPersonId', id);

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
    const positionAndMinutesOfMeetingTextEditor = createElement({ elementName: 'div', id: 'educationalProgramGuarantorPosition', style: "height: 100px" })

    const educationalProgramGuarantorLabel = document.getElementById('educationalProgramGuarantorLabel');

    educationalProgramGuarantorLabel.after(degree);
    degree.after(positionAndMinutesOfMeetingLabel);
    positionAndMinutesOfMeetingLabel.after(positionAndMinutesOfMeetingTextEditor);

    educationalProgramGuarantorPosition({ educationalProgramGuarantorId: id, educationalProgramGuarantorPositionName: '', wpId })
} 