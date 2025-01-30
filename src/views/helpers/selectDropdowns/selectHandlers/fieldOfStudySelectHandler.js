const fieldOfStudySelectHandler = async (wpId) => {
	const fieldsOfStudyIdsSelect = document.querySelector(`#fieldsOfStudyIdsSelect`);
	const rawSelectedFieldsOfStudyIds = JSON.parse(fieldsOfStudyIdsSelect.getAttribute('data-fieldsOfStudyIds'));
	const selectedFieldsOfStudyIds = rawSelectedFieldsOfStudyIds ? rawSelectedFieldsOfStudyIds.map(id => Number(id)) : [];

	// Ініціалізуємо або викликаємо Choices.js сутність 
	const fieldsOfStudyIdsSelectChoices = await getFieldOfStudyIdsSelectChoices();

	const results = await fetchFieldsOfStudy();

	// Обробляємо результути пошуку до опцій
	const options = results.map(fieldsOfStudy => {
		return {
			value: fieldsOfStudy.value.toString(),
			label: fieldsOfStudy.label,
			selected: selectedFieldsOfStudyIds.includes(fieldsOfStudy.value),
		};
	});

	// Очищаємо обрані choices і встановлюємо нові
	fieldsOfStudyIdsSelectChoices.clearStore();
	fieldsOfStudyIdsSelectChoices.setChoices(options, 'value', 'label', true);

	// Додаємо оновлені event listeners
	fieldsOfStudyIdsSelect.removeEventListener('change', handleFieldsOfStudyChangeEvent);

	fieldsOfStudyIdsSelect.addEventListener('change', () => handleFieldsOfStudyChangeEvent(fieldsOfStudyIdsSelectChoices, wpId));
};

const getFieldOfStudyIdsSelectChoices = async () => {
	const fieldsOfStudyIdsSelect = document.getElementById(`fieldsOfStudyIdsSelect`);

	// Перевіряємо чи об'єкт пошуку з вибором уже існує
	if (fieldsOfStudyIdsSelect.choicesInstance) {
		return await fieldsOfStudyIdsSelect.choicesInstance;
	}

	// Ініціалізуємо новий, якщо ні
	const choicesInstance = await createNewSelectWithSearch('#fieldsOfStudyIdsSelect');

	fieldsOfStudyIdsSelect.choicesInstance = choicesInstance;

	return choicesInstance;
};

const handleFieldsOfStudyChangeEvent = async (fieldsOfStudyIdsSelectChoices, wpId) => {
	const fieldsOfStudyIdsSelect = document.querySelector(`#fieldsOfStudyIdsSelect`);
	fieldsOfStudyIdsSelect.setAttribute('data-fieldsOfStudyIds', JSON.stringify(fieldsOfStudyIdsSelectChoices.getValue(true)));

	const updatedEvent = {
		target: {
			name: 'fieldsOfStudyIds',
			value: JSON.stringify(fieldsOfStudyIdsSelectChoices.getValue(true))
		}
	};

	await updateGeneralInfo(updatedEvent, wpId, true);
};