const initializeTextEditorForPrerequisitesAndGoal = ({ notes, prerequisites, goal, tasks, competences, programResults, controlMeasures, wpId }) => {
	// Змінюємо інпут для введення примітки
	const notesTextEditor = initializeTextEditorWithoutToolbar('#notes', false);
	// Змінюємо інпут для введення передумов для вивчення дисципліни
	const prerequisitesTextEditor = initializeTextEditorWithoutToolbar('#prerequisites', false);
	// Змінюємо інпут для введення мети для вивчення дисципліни
	const goalTextEditor = initializeTextEditorWithoutToolbar('#goal', false);
	// Змінюємо інпут для введення завдання дисципліни
	const tasksTextEditor = initializeTextEditorWithoutToolbar('#tasks', false);
	// Змінюємо інпут для введення компетентностей
	const competencesTextEditor = initializeTextEditorWithoutToolbar('#competences');
	// Змінюємо інпут для введення програмних результатів
	const programResultsTextEditor = initializeTextEditorWithoutToolbar('#programResults');
	// Змінюємо інпут для введення контрольних заходів
	const controlMeasuresTextEditor = initializeTextEditorWithoutToolbar('#controlMeasures');

	// Встановлюємо контент, який був збережений раніше
	notesTextEditor.root.innerHTML = notes;
	prerequisitesTextEditor.root.innerHTML = prerequisites;
	goalTextEditor.root.innerHTML = goal;
	tasksTextEditor.root.innerHTML = tasks;
	competencesTextEditor.root.innerHTML = competences;
	programResultsTextEditor.root.innerHTML = programResults;
	controlMeasuresTextEditor.root.innerHTML = controlMeasures;

	// Зберігаємо текст на кожне введення символу
	notesTextEditor.on('text-change', function () {
		if (notesTextEditor.root.innerHTML !== notes) {
			const event = {
				target: {
					name: 'notes',
					value: notesTextEditor.root.innerHTML
				}
			}

			updateGeneralInfo(event, wpId);
		}
	});

	prerequisitesTextEditor.on('text-change', function () {
		if (prerequisitesTextEditor.root.innerHTML !== prerequisites) {
			const event = {
				target: {
					name: 'prerequisites',
					value: prerequisitesTextEditor.root.innerHTML
				}
			}

			updateGeneralInfo(event, wpId);
		}
	});

	goalTextEditor.on('text-change', function () {
		if (goalTextEditor.root.innerHTML !== goal) {
			const event = {
				target: {
					name: 'goal',
					value: goalTextEditor.root.innerHTML
				}
			}

			updateGeneralInfo(event, wpId);
		}
	});

	tasksTextEditor.on('text-change', function () {
		if (tasksTextEditor.root.innerHTML !== tasks) {
			const event = {
				target: {
					name: 'tasks',
					value: tasksTextEditor.root.innerHTML
				}
			}

			updateGeneralInfo(event, wpId);
		}
	});

	competencesTextEditor.on('text-change', function () {
		if (competencesTextEditor.root.innerHTML !== competences) {
			const event = {
				target: {
					name: 'competences',
					value: competencesTextEditor.root.innerHTML
				}
			}

			updateGeneralInfo(event, wpId);
		}
	});

	programResultsTextEditor.on('text-change', function () {
		if (programResultsTextEditor.root.innerHTML !== programResults) {
			const event = {
				target: {
					name: 'programResults',
					value: programResultsTextEditor.root.innerHTML
				}
			}

			updateGeneralInfo(event, wpId);
		}
	});

	controlMeasuresTextEditor.on('text-change', function () {
		if (controlMeasuresTextEditor.root.innerHTML !== controlMeasures) {
			const event = {
				target: {
					name: 'controlMeasures',
					value: controlMeasuresTextEditor.root.innerHTML
				}
			}

			updateGeneralInfo(event, wpId);
		}
	});
} 