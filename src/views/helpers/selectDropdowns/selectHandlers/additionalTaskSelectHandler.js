const additionalTaskSelectHandler = async (semesterId) => {
	const additionalTaskIdsSelect = document.querySelector(`#additionalTaskIdsSelect${semesterId}`);
	const rawSelectedAdditionalTaskIds = JSON.parse(additionalTaskIdsSelect.getAttribute('data-additionalTaskIds'));
	const selectedAdditionalTaskIds = rawSelectedAdditionalTaskIds.map(id => Number(id));

	const results = await fetchAdditionalTasks();

	// Initialize or retrieve the Choices.js instance
	const additionalTaskIdsSelectChoices = getAdditionalTaskIdsSelectChoices(semesterId);

	// Map results to options
	const options = results.map(additionalTask => {
		return {
			value: additionalTask.value.toString(),
			label: additionalTask.label,
			selected: selectedAdditionalTaskIds.includes(additionalTask.value),
		};
	});

	// Clear existing choices and set new ones
	additionalTaskIdsSelectChoices.clearStore();
	additionalTaskIdsSelectChoices.setChoices(options, 'value', 'label', true);

	// Ensure event listeners are added only once
	additionalTaskIdsSelect.removeEventListener('choice', handleChoiceEvent);
	additionalTaskIdsSelect.removeEventListener('removeItem', handleRemoveEvent);

	additionalTaskIdsSelect.addEventListener('choice', (event) => handleChoiceEvent(event, semesterId));
	additionalTaskIdsSelect.addEventListener('removeItem', (event) => handleRemoveEvent(event, semesterId));
};

const getAdditionalTaskIdsSelectChoices = (semesterId) => {
	const additionalTaskIdsSelect = document.getElementById(`additionalTaskIdsSelect${semesterId}`);

	// Check if a Choices instance already exists
	if (additionalTaskIdsSelect.choicesInstance) {
		return additionalTaskIdsSelect.choicesInstance;
	}

	// Initialize a new Choices instance if not already initialized
	const choicesInstance = new Choices(additionalTaskIdsSelect, {
		removeItemButton: true,
		searchEnabled: true,
	});

	// Attach the instance to the DOM element for future reference
	additionalTaskIdsSelect.choicesInstance = choicesInstance;

	return choicesInstance;
};

const handleChoiceEvent = async (event, semesterId) => {
	await createAdditionalTask(event.detail.value, semesterId);
};

const handleRemoveEvent = async (event, semesterId) => {
	await deleteAdditionalTask(event.detail.value, semesterId);
};