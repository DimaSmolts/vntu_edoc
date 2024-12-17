const approvedByPosition = ({ approvedByPositionId, approvedByPositionName, wpId }) => {
	// Змінюємо інпут для введення "Посада. Протокол засідання" для гаранта	освітньої програми
	const approvedByPositionTextEditor = initializeTextEditorWithoutToolbar('#approvedByPosition');

	// Зберігаємо текст на кожне введення символу
	approvedByPositionTextEditor.on('text-change', function () {
		if (approvedByPositionTextEditor.root.innerHTML !== approvedByPositionName) {
			const event = {
				target: {
					name: 'positionAndMinutesOfMeeting',
					value: approvedByPositionTextEditor.root.innerHTML
				}
			}

			updateWPInvolvedPersonDetails(event, approvedByPositionId, wpId);
		}
	});
} 