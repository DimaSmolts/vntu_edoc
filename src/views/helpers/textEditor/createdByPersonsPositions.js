const createdByPersonsPositions = ({ createdByPersons, wpId }) => {
	// Перебираємо всі розробників
	createdByPersons.forEach(createdByPerson => {
		// Змінюємо інпут для введення "Посада. Протокол засідання" для певного розробника
		const createdByPersonPositionTextEditor = initializeTextEditorWithoutToolbar(`#createdByPerson${createdByPerson.id}Position`);

		// Зберігаємо текст на кожне введення символу
		createdByPersonPositionTextEditor.on('text-change', function () {
			if (createdByPersonPositionTextEditor.root.innerHTML !== createdByPerson.positionAndMinutesOfMeeting) {
				const event = {
					target: {
						name: 'positionAndMinutesOfMeeting',
						value: createdByPersonPositionTextEditor.root.innerHTML
					}
				}

				updateWPInvolvedPersonDetails(event, createdByPerson.id, wpId);
			}
		});
	});
} 