const selectNewCreatedBy = async ({ wpInvolvedPersonId, personId, wpId, oldCreatedByInvolvedPersonsIds, label }) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 2,
    };

    const id = await updateWPInvolvedPerson(postData);

    const createdByPersonsSelect = document.getElementById('createdByPersonsIdsSelect');
    oldCreatedByInvolvedPersonsIds[id] = personId;

    const updatedCreatedByInvolvedPersonsIds = JSON.stringify(oldCreatedByInvolvedPersonsIds);
    createdByPersonsSelect.setAttribute('data-createdByInvolvedPersonsIds', updatedCreatedByInvolvedPersonsIds);

    const personName = label.split(",")[0];

    const personBlock = createElement({ elementName: 'div', id: `createdBy${id}AdditionalInfoBlock` });
    const personNameTitle = createElement({ elementName: "p", innerText: personName, classList: ['mini-block-title'] });

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

    const positionAndMinutesOfMeetingLabel = createElement({ elementName: "label", innerText: 'Посада. Протокол засідання:' });
    const positionAndMinutesOfMeetingTextEditor = createElement({ elementName: 'div', id: `createdByPerson${id}Position`, style: "height: 100px" })

    personBlock.appendChild(personNameTitle);
    personBlock.appendChild(degree);
    personBlock.appendChild(positionAndMinutesOfMeetingLabel);
    personBlock.appendChild(positionAndMinutesOfMeetingTextEditor);

    const createdByAdditionalInfoBlock = document.getElementById('createdByAdditionalInfoBlock');
    createdByAdditionalInfoBlock.classList.remove('one-column', 'two-columns', 'three-columns');

    let columnClass = 'three-columns';

    switch (Object.entries(oldCreatedByInvolvedPersonsIds).length) {
        case 1:
            columnClass = 'one-column';
            break;
        case 2:
            columnClass = 'two-columns';
            break;
        default:
            break;
    }

    createdByAdditionalInfoBlock.classList.add(columnClass);

    createdByAdditionalInfoBlock.appendChild(personBlock);

    createdByPersonPosition({ createdByPersonId: id, createdByPersonPositionName: '', wpId })
} 