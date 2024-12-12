const approvedByPosition = ({ approvedByPositionId, approvedByPositionPositionName, wpId }) => {
	// Змінюємо інпут для введення "Посада. Протокол засідання" для гаранта	освітньої програми
	const approvedByPositionPositionTextEditor = initializeTextEditor('#approvedByPositionPosition');

	// Зберігаємо текст на кожне введення символу
	approvedByPositionPositionTextEditor.on('text-change', function () {
		if (approvedByPositionPositionTextEditor.root.innerHTML !== approvedByPositionPositionName) {
			const event = {
				target: {
					name: 'positionAndMinutesOfMeeting',
					value: approvedByPositionPositionTextEditor.root.innerHTML
				}
			}

			updateWPInvolvedPersonDetails(event, approvedByPositionId, wpId);
		}
	});
} 