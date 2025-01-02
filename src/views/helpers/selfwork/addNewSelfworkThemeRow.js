const addNewSelfworkThemeRow = (semesterId, educationalForms, selfworkId) => {
	const row = createElement({ elementName: 'tr', id: `selfworkRow${selfworkId}`, classList: ['selfwork-row'] });

	const numberColumnInput = createElement({
		elementName: 'input',
		min: 0,
		value: '',
		classList: ['center-text-align'],
		name: 'lessonNumber',
		eventListenerType: 'input',
		eventListener: (e) => {
			updateSelfworkTheme(e, semesterId, selfworkId);
		}
	})

	const textNode = createElement({ elementName: 'span', innerText: '1.' });

	const numberColumn = createElement({
		elementName: 'th',
		classList: ['selfwork-number-column'],
	})

	const numberContainer = createElement({
		elementName: 'div',
		classList: ['sub-number-container']
	})

	numberContainer.appendChild(textNode);
	numberContainer.appendChild(numberColumnInput);
	numberColumn.appendChild(numberContainer);

	row.appendChild(numberColumn);

	const themeNameColumn = createElement({
		elementName: 'td',
		colspan: 2,
		classList: ['selfwork-educational-forms-column', 'table-input-cell']
	})

	const themeNameInput = createElement({
		elementName: 'input',
		type: 'text',
		placeholder: 'Введіть тему для самостійного опрацювання',
		value: '',
		name: 'name',
		eventListenerType: 'input',
		eventListener: (e) => {
			updateSelfworkTheme(e, semesterId, selfworkId);
		}
	})

	themeNameColumn.appendChild(themeNameInput);
	row.appendChild(themeNameColumn);

	educationalForms.forEach(educationalForm => {
		const hoursColumn = createElement({
			elementName: 'td',
			classList: ['selfwork-educational-forms-column', 'table-input-cell']
		})

		const hoursInput = createElement({
			elementName: 'input',
			type: 'number',
			min: 0,
			classList: ['center-text-align'],
			value: '',
			eventListenerType: 'input',
			eventListener: (e) => {
				updateSelfworkHours(e, educationalForm.id, semesterId, selfworkId);
			}
		})

		hoursColumn.appendChild(hoursInput);
		row.appendChild(hoursColumn);
	})

	const removeColumn = createElement({
		elementName: 'td',
		classList: ['selfwork-educational-forms-column', 'table-without-border']
	})

	const removeBtn = createElement({
		elementName: 'button',
		type: 'button',
		classList: ['btn'],
		innerText: 'Видалити тему',
		eventListenerType: 'click',
		eventListener: (e) => {
			openApproveDeletingModal('тему для самостійного опрацювання', () => deleteSelfworkTheme(e, selfworkId, semesterId));
		}
	})

	removeColumn.appendChild(removeBtn);
	row.appendChild(removeColumn);

	const table = document.getElementById(`selfworkTable${semesterId}`);

	const selfworkRows = table.querySelectorAll('.selfwork-row')

	if (selfworkRows.length > 0) {
		const lastSelfworkRow = selfworkRows[selfworkRows.length - 1];

		lastSelfworkRow.after(row);
	} else {
		const titleSelfwork = document.getElementById(`titleSelfwork${semesterId}`);

		titleSelfwork.after(row);
	}
}