const headOfDepartmentPosition = ({ headOfDepartmentId, headOfDepartmentPositionName, wpId }) => {
	// Змінюємо інпут для введення "Посада. Протокол засідання" для гаранта	освітньої програми
	const headOfDepartmentPositionTextEditor = initializeTextEditor('#headOfDepartmentPosition');

	// Зберігаємо текст на кожне введення символу
	headOfDepartmentPositionTextEditor.on('text-change', function () {
		if (headOfDepartmentPositionTextEditor.root.innerHTML !== headOfDepartmentPositionName) {
			const event = {
				target: {
					name: 'positionAndMinutesOfMeeting',
					value: headOfDepartmentPositionTextEditor.root.innerHTML
				}
			}

			updateWPInvolvedPersonDetails(event, headOfDepartmentId, wpId);
		}
	});
} 