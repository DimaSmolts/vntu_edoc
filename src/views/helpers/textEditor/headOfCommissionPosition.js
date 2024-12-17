const headOfCommissionPosition = ({ headOfCommissionId, headOfCommissionPositionName, wpId }) => {
	// Змінюємо інпут для введення "Посада. Протокол засідання" для гаранта	освітньої програми
	const headOfCommissionPositionTextEditor = initializeTextEditorWithoutToolbar('#headOfCommissionPosition');

	// Зберігаємо текст на кожне введення символу
	headOfCommissionPositionTextEditor.on('text-change', function () {
		if (headOfCommissionPositionTextEditor.root.innerHTML !== headOfCommissionPositionName) {
			const event = {
				target: {
					name: 'positionAndMinutesOfMeeting',
					value: headOfCommissionPositionTextEditor.root.innerHTML
				}
			}

			updateWPInvolvedPersonDetails(event, headOfCommissionId, wpId);
		}
	});
} 