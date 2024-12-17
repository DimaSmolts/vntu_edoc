const createdByPersonsSelectHandler = async () => {
	const createdByPersonsIdsSelect = document.querySelector('#createdByPersonsIdsSelect');
	const wpId = createdByPersonsIdsSelect.getAttribute('data-wpId');
	const selectedCreatedByInvolvedPersonsIds = JSON.parse(createdByPersonsIdsSelect.getAttribute('data-createdByInvolvedPersonsIds'));

	// Очищаємо всі наявні опції та ініціалізуємо Choices.js
	const createdByPersonsIdsSelectChoices = createNewSelectWithSearch('#createdByPersonsIdsSelect'); // Перезапускаємо Choices.js

	const createdByPersonsIdsSelectSearchDropdown = async (inputValue) => {
		const personsIds = Object.values(selectedCreatedByInvolvedPersonsIds);
		if (inputValue.length < 3) {
			createdByPersonsIdsSelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		// Спочатку отримуємо факультети з бекенду
		const results = await fetchTeachers(inputValue);

		createdByPersonsIdsSelectChoices.clearChoices(); // Очищаємо старі результати

		const options = results.map(createdByPersons => {
			return new Option(createdByPersons.label, createdByPersons.value, personsIds.includes(createdByPersons.value), personsIds.includes(createdByPersons.value));
		});

		createdByPersonsIdsSelectChoices.setChoices(options, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник події для пошуку
	createdByPersonsIdsSelect.addEventListener('search', (event) => {
		createdByPersonsIdsSelectSearchDropdown(event.detail.value); // `detail.value` містить введене значення
	});

	createdByPersonsIdsSelect.addEventListener('choice', function (event) {
		const updatedSelectedCreatedByInvolvedPersonsIds = JSON.parse(createdByPersonsIdsSelect.getAttribute('data-createdByInvolvedPersonsIds'));

		selectNewCreatedBy({
			wpInvolvedPersonId: null,
			personId: event.detail.value,
			wpId,
			oldCreatedByInvolvedPersonsIds: updatedSelectedCreatedByInvolvedPersonsIds,
			label: event.detail.label
		})
	});

	// Event listener for when an item is removed
	createdByPersonsIdsSelect.addEventListener('removeItem', function (event) {
		console.log('Item removed:', event.detail);
		const updatedSelectedCreatedByInvolvedPersonsIds = JSON.parse(createdByPersonsIdsSelect.getAttribute('data-createdByInvolvedPersonsIds'));

		const involvedPersonId = Number(Object.entries(updatedSelectedCreatedByInvolvedPersonsIds).find(([invPersonId, personId]) => Number(personId) === Number(event.detail.value))?.[0]);

		const newSelectedCreatedByInvolvedPersonsIds = Object.fromEntries(
			Object.entries(updatedSelectedCreatedByInvolvedPersonsIds).filter(([invPersonId]) => Number(invPersonId) !== Number(involvedPersonId))
		);
		console.log(newSelectedCreatedByInvolvedPersonsIds)

		removeWPInvolvedPerson({ id: involvedPersonId, isCreatedBy: true, newSelectedCreatedByInvolvedPersonsIds });
	});

	// // Додаємо обробник події для вибору факультету
	// createdByPersonsIdsSelect.addEventListener('change', async () => {
	// 	const personsInSelect = createdByPersonsIdsSelectChoices.getValue(true);
	// 	const oldPersonsIds = Object.values(selectedCreatedByInvolvedPersonsIds);

	// 	let newPersonId, removedInvolvedPersonId;

	// 	console.log({
	// 		personsInSelect,
	// 		oldPersonsIds
	// 	})
	// 	personsInSelect.forEach(personId => {
	// 		if (!oldPersonsIds.includes(Number(personId))) {
	// 			newPersonId = Number(personId);
	// 		}
	// 	})

	// 	Object.entries(selectedCreatedByInvolvedPersonsIds).forEach(([involvedPersonId, personId]) => {
	// 		if (!personsInSelect.includes(personId)) {
	// 			removedInvolvedPersonId = involvedPersonId;
	// 		}
	// 	});

	if (selectedCreatedByInvolvedPersonsIds) {
		const personsIds = Object.values(selectedCreatedByInvolvedPersonsIds);
		const results = await fetchTeachersByIds(personsIds);

		// Заповнюємо список опцій, включаючи попередньо обраних розробників
		const options = results.map(createdByPersons => {
			return new Option(createdByPersons.label, createdByPersons.value, personsIds.includes(createdByPersons.value), personsIds.includes(createdByPersons.value));
		});

		createdByPersonsIdsSelectChoices.setChoices(options, 'value', 'label', true);  // Встановлюємо опції з попередньо вибраним значенням
	}
};
