const docApprovedByPosition = ({ docApprovedById, docApprovedByPositionName, wpId }) => {
	// Змінюємо інпут для введення "Посада. Протокол засідання" для гаранта	освітньої програми
	const docApprovedByPositionTextEditor = initializeTextEditor('#docApprovedByPosition');

	// Зберігаємо текст на кожне введення символу
	docApprovedByPositionTextEditor.on('text-change', function () {
		if (docApprovedByPositionTextEditor.root.innerHTML !== docApprovedByPositionName) {
			const event = {
				target: {
					name: 'positionAndMinutesOfMeeting',
					value: docApprovedByPositionTextEditor.root.innerHTML
				}
			}

			updateWPInvolvedPersonDetails(event, docApprovedById, wpId);
		}
	});
} 