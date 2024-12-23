const initializeTextEditorForStudingAndExamingMethods = ({
	individualTaskNotes,
	studingMethods,
	examingMethods,
	methodologicalSupport,
	wpId
}) => {
	// Змінюємо інпут для введення примітки
	const individualTaskNotesTextEditor = initializeTextEditorWithoutToolbar('#individualTaskNotes', false);
	// Змінюємо інпут для введення передумов для вивчення дисципліни
	const studingMethodsTextEditor = initializeTextEditorWithoutToolbar('#studingMethods', false);
	// Змінюємо інпут для введення мети для вивчення дисципліни
	const examingMethodsTextEditor = initializeTextEditorWithoutToolbar('#examingMethods', false);
	// Змінюємо інпут для введення завдання дисципліни
	const methodologicalSupportTextEditor = initializeTextEditorWithoutToolbar('#methodologicalSupport', false, true);

	// Встановлюємо контент, який був збережений раніше
	individualTaskNotesTextEditor.root.innerHTML = individualTaskNotes;
	studingMethodsTextEditor.root.innerHTML = studingMethods;
	examingMethodsTextEditor.root.innerHTML = examingMethods;
	methodologicalSupportTextEditor.root.innerHTML = methodologicalSupport;

	// Зберігаємо текст на кожне введення символу
	individualTaskNotesTextEditor.on('text-change', function () {
		if (individualTaskNotesTextEditor.root.innerHTML !== individualTaskNotes) {
			const event = {
				target: {
					name: 'individualTaskNotes',
					value: individualTaskNotesTextEditor.root.innerHTML
				}
			}

			updateGeneralInfo(event, wpId);
		}
	});

	studingMethodsTextEditor.on('text-change', function () {
		if (studingMethodsTextEditor.root.innerHTML !== studingMethods) {
			const event = {
				target: {
					name: 'studingMethods',
					value: studingMethodsTextEditor.root.innerHTML
				}
			}

			updateGeneralInfo(event, wpId);
		}
	});

	examingMethodsTextEditor.on('text-change', function () {
		if (examingMethodsTextEditor.root.innerHTML !== examingMethods) {
			const event = {
				target: {
					name: 'examingMethods',
					value: examingMethodsTextEditor.root.innerHTML
				}
			}

			updateGeneralInfo(event, wpId);
		}
	});

	methodologicalSupportTextEditor.on('text-change', function () {
		if (methodologicalSupportTextEditor.root.innerHTML !== methodologicalSupport) {
			const event = {
				target: {
					name: 'methodologicalSupport',
					value: methodologicalSupportTextEditor.root.innerHTML
				}
			}

			updateGeneralInfo(event, wpId);
		}
	});
} 