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

    const positionAndMinutesOfMeeting = createLabelWithTextarea({
        labelText: 'Посада. Протокол засідання:',
        inputName: 'positionAndMinutesOfMeeting',
        rows: 5,
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, id, wpId)
        }
    });
    const educationalProgramGuarantorLabel = document.getElementById('educationalProgramGuarantorLabel');

    educationalProgramGuarantorLabel.after(positionAndMinutesOfMeeting);
} 