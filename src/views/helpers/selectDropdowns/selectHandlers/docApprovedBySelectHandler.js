const docApprovedBySelectHandler = () => {
	const docApprovedBySelectChoices = createNewSelectWithSearch('#docApprovedBySelect');

	const docApprovedBySelectSearchDropdown = async (inputValue) => {
		if (inputValue.length < 3) {
			docApprovedBySelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		const results = await fetchTeachers(inputValue);
		docApprovedBySelectChoices.clearChoices(); // Очищаємо старі результати
		docApprovedBySelectChoices.setChoices(results, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник на пошук
	document.querySelector('#docApprovedBySelect').addEventListener('search', (event) => {
		docApprovedBySelectSearchDropdown(event.detail.value); // `detail.value` contains user input
	});

	// Додаємо обробник на вибір персони
	document.querySelector('#docApprovedBySelect').addEventListener('change', async (event) => {
		const select = document.getElementById('docApprovedBySelect');
		const wpInvolvedPersonId = select.getAttribute('data-wpInvolvedPersonId');
		const wpId = select.getAttribute('data-wpId');

		if (wpInvolvedPersonId && event.target.value) {
			await selectDocApprovedBy(wpInvolvedPersonId, event.target.value, wpId);
		} else if (!event.target.value) {
			await removeWPInvolvedPerson({ id: wpInvolvedPersonId, isDocAprovedBy: true });
		} else {
			await selectNewDocApprovedBy(null, event.target.value, wpId);
		}
	});
};