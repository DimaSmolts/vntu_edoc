const addNewSelfworkThemeRow = (semesterId, educationalForms, selfworkId) => {
	const row = createElement({ elementName: 'tr', id: `selfworkRow${selfworkId}`, classList: ['selfwork-row'] });

	const numberColumn = createElement({
		elementName: 'th',
		classList: ['selfwork-number-column'],
		innerText: '1.'
	});

	row.appendChild(numberColumn);

	const numberColumnInputCell = createElement({
		elementName: 'td',
		classList: ['selfwork-subnumber-column', 'table-input-cell'],
	});

	const numberColumnInput = createElement({
		elementName: 'input',
		min: 0,
		value: '',
		type: 'number',
		classList: ['center-text-align'],
		name: 'lessonNumber',
		eventListenerType: 'input',
		eventListener: (e) => {
			updateSelfworkTheme(e, semesterId, selfworkId);
		}
	})

	numberColumnInputCell.appendChild(numberColumnInput);

	row.appendChild(numberColumnInputCell);

	const themeNameColumn = createElement({
		elementName: 'td',
		classList: ['selfwork-theme-column', 'table-input-cell']
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

	const workloadColumn = createElement({
		elementName: 'td',
		innerText: 'не менше 1 години на 1 тему'
	})

	row.appendChild(workloadColumn);

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
		classList: ['btn', 'remove-selfwork-theme-btn'],
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