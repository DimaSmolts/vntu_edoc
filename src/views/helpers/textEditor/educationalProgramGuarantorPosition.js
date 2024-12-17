const educationalProgramGuarantorPosition = ({ educationalProgramGuarantorId, educationalProgramGuarantorPositionName, wpId }) => {
	// Змінюємо інпут для введення "Посада. Протокол засідання" для гаранта	освітньої програми
	const educationalProgramGuarantorPositionTextEditor = initializeTextEditorWithoutToolbar('#educationalProgramGuarantorPosition');

	console.log(educationalProgramGuarantorPositionTextEditor);
	// Зберігаємо текст на кожне введення символу
	educationalProgramGuarantorPositionTextEditor.on('text-change', function () {
		if (educationalProgramGuarantorPositionTextEditor.root.innerHTML !== educationalProgramGuarantorPositionName) {
			const event = {
				target: {
					name: 'positionAndMinutesOfMeeting',
					value: educationalProgramGuarantorPositionTextEditor.root.innerHTML
				}
			}

			updateWPInvolvedPersonDetails(event, educationalProgramGuarantorId, wpId);
		}
	});
} 