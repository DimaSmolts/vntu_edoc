const additionalTaskSelectHandler = async (semesterId) => {
	const additionalTaskIdsSelect = document.querySelector(`#additionalTaskIdsSelect${semesterId}`);
	const rawSelectedAdditionalTaskIds = JSON.parse(additionalTaskIdsSelect.getAttribute('data-additionalTaskIds'));
	const selectedAdditionalTaskIds = rawSelectedAdditionalTaskIds.map(id => Number(id));

	const results = await fetchAdditionalTasks();

	// Ініціалізуємо або викликаємо Choices.js сутність 
	const additionalTaskIdsSelectChoices = getAdditionalTaskIdsSelectChoices(semesterId);

	// Обробляємо результути пошуку до опцій
	const options = results.map(additionalTask => {
		return {
			value: additionalTask.value.toString(),
			label: additionalTask.label,
			selected: selectedAdditionalTaskIds.includes(additionalTask.value),
		};
	});

	// Очищаємо обрані choices і встановлюємо нові
	additionalTaskIdsSelectChoices.clearStore();
	additionalTaskIdsSelectChoices.setChoices(options, 'value', 'label', true);

	// Додаємо оновлені event listeners
	additionalTaskIdsSelect.removeEventListener('choice', handleAdditionalTaskChoiceEvent);
	additionalTaskIdsSelect.removeEventListener('removeItem', handleAdditionalTaskRemoveEvent);

	additionalTaskIdsSelect.addEventListener('choice', (event) => handleAdditionalTaskChoiceEvent(event, semesterId));
	additionalTaskIdsSelect.addEventListener('removeItem', (event) => handleAdditionalTaskRemoveEvent(event, semesterId));
};

const getAdditionalTaskIdsSelectChoices = (semesterId) => {
	const additionalTaskIdsSelect = document.getElementById(`additionalTaskIdsSelect${semesterId}`);

	// Перевіряємо чи об'єкт пошуку з вибором уже існує
	if (additionalTaskIdsSelect.choicesInstance) {
		return additionalTaskIdsSelect.choicesInstance;
	}

	// Ініціалізуємо новий, якщо ні
	const choicesInstance = new Choices(additionalTaskIdsSelect, {
		removeItemButton: true,
		searchEnabled: true,
	});

	additionalTaskIdsSelect.choicesInstance = choicesInstance;

	return choicesInstance;
};

const handleAdditionalTaskChoiceEvent = async (event, semesterId) => {
	await createAdditionalTask(event.detail.value, semesterId);
};

const handleAdditionalTaskRemoveEvent = async (event, semesterId) => {
	await deleteAdditionalTask(event.detail.value, semesterId);
};