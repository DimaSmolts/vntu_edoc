const selectNewEducationalProgramGuarantor = async (wpInvolvedPersonId, personId, wpId) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 3,
    };

    const newInvolvedPerson = await updateWPInvolvedPerson(postData);

    const educationalProgramGuarantorSelect = document.getElementById('educationalProgramGuarantorSelect');
    educationalProgramGuarantorSelect.setAttribute('data-wpInvolvedPersonId', newInvolvedPerson.id);
    educationalProgramGuarantorSelect.setAttribute('data-educationalProgramGuarantorId', newInvolvedPerson.personId);

    const degree = createLabelWithInput({
        labelText: 'Cтупінь:',
        inputType: 'text',
        inputName: 'degree',
        placeholder: 'к.т.н.',
        labelId: 'educationalProgramGuarantorDegree',
        value: '',
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, id, wpId)
        }
    });

    const position = createLabelWithInput({
        labelText: 'Посада:',
        inputType: 'text',
        inputName: 'position',
        placeholder: 'Гарант освітньої програми, завідувач кафедри ТАМ',
        labelId: 'educationalProgramGuarantorPosition',
        value: '',
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, id, wpId)
        }
    });

    const educationalProgramGuarantorBlock = document.getElementById('educationalProgramGuarantorBlock');
    educationalProgramGuarantorBlock.classList.remove('involved-person-info-block');
    educationalProgramGuarantorBlock.classList.add('guarantor-info-block', 'involved-person-additional-info-block')

    educationalProgramGuarantorBlock.appendChild(degree);
    educationalProgramGuarantorBlock.appendChild(position);
} 