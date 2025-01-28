const createLessonRow = ({
	lessonTypeName,
	lessonId,
	semesterEducationalForms,
	educationalFormsInSemesters,
	idx,
}) => {
	const row = createElement({ elementName: 'tr', id: `lesson${lessonId}` });

	const numberCell = createElement({
		elementName: 'td',
		classList: ['table-input-cell', 'lesson-number-column', 'center-text-align']
	});

	const numberInput = createElement({
		elementName: "input",
		type: 'number',
		name: 'lessonNumber',
		classList: ['center-text-align'],
		value: null,
		eventListenerType: 'input',
		eventListener: (event) => {
			updateLessonInfo(event, lessonId);
		}
	});

	numberCell.appendChild(numberInput);
	row.appendChild(numberCell);

	const nameCell = createElement({
		elementName: 'td',
		classList: ['table-input-cell']
	});

	const nameInput = createElement({
		elementName: "input",
		type: 'text',
		name: 'name',
		value: '',
		eventListenerType: 'input',
		eventListener: (event) => {
			updateLessonInfo(event, lessonId);
		}
	});

	nameCell.appendChild(nameInput);
	row.appendChild(nameCell);

	Object.keys(educationalFormsInSemesters).forEach(colName => {
		const educationalFormId = semesterEducationalForms.find(form => {
			if (form.colName === colName) {
				return form;
			}
		})?.id;

		if (educationalFormId) {
			const educationalFormCell = createElement({
				elementName: 'td',
				classList: ['lesson-hours-column', 'table-input-cell']
			});

			const hoursInput = createElement({
				elementName: "input",
				type: 'number',
				name: 'hours',
				min: 1,
				classList: ['center-text-align'],
				value: null,
				eventListenerType: 'input',
				eventListener: (event) => {
					updateHours(event, lessonId, educationalFormId)
				}
			});

			educationalFormCell.appendChild(hoursInput);
			row.appendChild(educationalFormCell);
		} else {
			const educationalFormCell = createElement({
				elementName: 'td',
				classList: ['center-text-align', 'disabled-cell']
			});

			row.appendChild(educationalFormCell);
		}
	})

	const removeBtnCell = createElement({
		elementName: 'td',
		classList: ['add-lesson-column', 'table-without-border']
	});

	const removeBtn = createElement({
		elementName: "button",
		innerText: "Видалити",
		classList: ["btn", "remove-lesson-btn"],
		eventListenerType: 'click',
		eventListener: (event) => {
			openApproveDeletingModal('заняття', () => deleteLesson(event, lessonId));
		}
	});

	removeBtnCell.appendChild(removeBtn);
	row.appendChild(removeBtnCell);

	const tableBody = document.getElementById(`${lessonTypeName}Table`);
	const nextModuleRow = document.getElementById(`${lessonTypeName}Module${idx + 1}`);

	if (nextModuleRow) {
		tableBody.insertBefore(row, nextModuleRow);
	} else {
		tableBody.appendChild(row);
	}
}
