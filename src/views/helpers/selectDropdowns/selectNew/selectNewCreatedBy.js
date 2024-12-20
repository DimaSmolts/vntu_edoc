const selectNewCreatedBy = async ({ wpInvolvedPersonId, personId, wpId, oldCreatedByInvolvedPersonsIds, label }) => {
    const postData = {
        wpInvolvedPersonId,
        wpId,
        personId,
        roleId: 2,
    };

    const newInvolvedPerson = await updateWPInvolvedPerson(postData);

    const createdByPersonsSelect = document.getElementById('createdByPersonsIdsSelect');
    const oldSelectedCreatedByInvolvedPersonsIds = oldCreatedByInvolvedPersonsIds ?? []
    oldSelectedCreatedByInvolvedPersonsIds[newInvolvedPerson.id] = newInvolvedPerson.personId;

    const updatedCreatedByInvolvedPersonsIds = JSON.stringify(oldSelectedCreatedByInvolvedPersonsIds);
    createdByPersonsSelect.setAttribute('data-createdByInvolvedPersonsIds', updatedCreatedByInvolvedPersonsIds);

    const personName = label.split(",")[0];

    const personBlock = createElement({ elementName: 'div', id: `createdBy${newInvolvedPerson.id}AdditionalInfoBlock`, classList: ["created-by-additional-info-block"] });
    const personNameTitle = createElement({ elementName: "p", innerText: personName, classList: ['mini-block-title'] });

    const degree = createLabelWithInput({
        labelText: 'Cтупінь:',
        inputType: 'text',
        inputName: 'degree',
        placeholder: 'к.т.н.',
        value: '',
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, newInvolvedPerson.id, wpId)
        }
    });

    const position = createLabelWithInput({
        labelText: 'Посада:',
        inputType: 'text',
        inputName: 'position',
        placeholder: 'Доцент кафедри ТАM',
        value: '',
        eventListener: (event) => {
            updateWPInvolvedPersonDetails(event, newInvolvedPerson.id, wpId)
        }
    });

    personBlock.appendChild(personNameTitle);
    personBlock.appendChild(degree);
    personBlock.appendChild(position);

    const createdByAdditionalInfoBlock = document.getElementById('createdByAdditionalInfoBlock');

    createdByAdditionalInfoBlock.appendChild(personBlock);
} 