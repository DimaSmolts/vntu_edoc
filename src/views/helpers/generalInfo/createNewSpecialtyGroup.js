const createNewSpecialtyGroup = async (wpId) => {
	const specialtyContainer = document.querySelector('#specialtyContainer');
	const rawIndexes = JSON.parse(specialtyContainer.getAttribute('data-indexes'));
	const indexes = rawIndexes.map(idx => Number(idx));

	const lastIndex = indexes[indexes.length - 1];
	const newIndex = lastIndex + 1;

	const updatedIndexes = JSON.stringify([...rawIndexes, newIndex]);
	specialtyContainer.setAttribute('data-indexes', updatedIndexes);

	const newSpecialtyGroup = createElement({
		elementName: 'div',
		classList: ['specialty-group']
	});

	const newSpecialtyDropdownLabel = createElement({
		elementName: 'label',
	});

	const newSpecialtyDropdownLabelSpan = createElement({
		elementName: 'span',
		innerText: 'Спеціальність:'
	});

	newSpecialtyDropdownLabel.appendChild(newSpecialtyDropdownLabelSpan);

	const newSpecialtySelect = createElement({
		elementName: 'select',
		id: `specialtyIdSelect${newIndex}`,
		data: {
			'wpId': wpId,
			'idx': newIndex
		}
	});

	newSpecialtyDropdownLabel.appendChild(newSpecialtySelect);
	newSpecialtyGroup.appendChild(newSpecialtyDropdownLabel);

	const newEducationalProgramDropdownLabel = createElement({
		elementName: 'label',
		id: `educationalProgramIdsLabel${newIndex}`,
		classList: ['multiselect-label', 'educational-program-invisible']
	});

	const newEducationalProgramDropdownLabelSpan = createElement({
		elementName: 'span',
		innerText: 'Освітні програми:'
	});

	newEducationalProgramDropdownLabel.appendChild(newEducationalProgramDropdownLabelSpan);

	const newEducationalProgramSelect = createElement({
		elementName: 'select',
		id: `educationalProgramIdsSelect${newIndex}`,
		multiple: true,
		data: {
			'wpId': wpId,
			'idx': newIndex
		}
	});

	newEducationalProgramDropdownLabel.appendChild(newEducationalProgramSelect);
	newSpecialtyGroup.appendChild(newEducationalProgramDropdownLabel);

	specialtyContainer.appendChild(newSpecialtyGroup);

	specialtySelectHandler(newIndex);
	educationalProgramSelectHandler(newIndex);
}