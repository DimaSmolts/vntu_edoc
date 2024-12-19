const involvedPersonSelectHandler = async ({ involvedPersonName, selectInvolvedPerson, selectNewInvolvedPerson }) => {
	const involvedPersonSelect = document.getElementById(`${involvedPersonName}Select`);
	const involvedPersonId = involvedPersonSelect.getAttribute(`data-${involvedPersonName}Id`);
	const wpId = involvedPersonSelect.getAttribute('data-wpId');

	const involvedPersonSelectChoices = createNewSelectWithSearch(`#${involvedPersonName}Select`);

	const involvedPersonSelectSearchDropdown = async (inputValue) => {
		if (inputValue.length < 3) {
			involvedPersonSelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		const results = await fetchTeachers(inputValue);
		involvedPersonSelectChoices.clearChoices(); // Очищаємо старі результати
		involvedPersonSelectChoices.setChoices(results, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник на пошук
	document.querySelector(`#${involvedPersonName}Select`).addEventListener('search', (event) => {
		involvedPersonSelectSearchDropdown(event.detail.value);
	});

	// Додаємо обробник на вибір персони
	document.querySelector(`#${involvedPersonName}Select`).addEventListener('change', async (event) => {
		const wpInvolvedPersonId = involvedPersonSelect.getAttribute('data-wpInvolvedPersonId');

		if (wpInvolvedPersonId && event.target.value) {
			await selectInvolvedPerson(wpInvolvedPersonId, event.target.value, wpId);
		} else if (!event.target.value) {
			await removeWPInvolvedPerson({ id: wpInvolvedPersonId, personPositionName: involvedPersonName });
		} else {
			await selectNewInvolvedPerson(null, event.target.value, wpId);
		}
	});

	if (involvedPersonId) {
		const result = await fetchTeacherById(Number(involvedPersonId));

		const options = [result].map(option => {
			return new Option(option.label, option.value, Number(involvedPersonId) === option.value, Number(involvedPersonId) === option.value);

		});

		involvedPersonSelectChoices.setChoices(options, 'value', 'label', true);
	}
}