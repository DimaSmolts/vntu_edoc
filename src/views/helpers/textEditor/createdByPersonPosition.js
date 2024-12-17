const createdByPersonPosition = ({ createdByPersonId, createdByPersonPositionName, wpId }) => {
	// Змінюємо інпут для введення "Посада. Протокол засідання" для певного розробника
	const createdByPersonPositionTextEditor = initializeTextEditorWithoutToolbar(`#createdByPerson${createdByPersonId}Position`);

	// Зберігаємо текст на кожне введення символу
	createdByPersonPositionTextEditor.on('text-change', function () {
		if (createdByPersonPositionTextEditor.root.innerHTML !== createdByPersonPositionName) {
			const event = {
				target: {
					name: 'positionAndMinutesOfMeeting',
					value: createdByPersonPositionTextEditor.root.innerHTML
				}
			}

			updateWPInvolvedPersonDetails(event, createdByPersonId, wpId);
		}
	});
} 