const approvedBySelectHandler = () => {
	const approvedBySelectChoices = createNewSelect('#approvedBySelect');

	const approvedBySelectSearchDropdown = async (inputValue) => {
		if (inputValue.length < 3) {
			approvedBySelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		const results = await fetchSearchTeachersResults(inputValue);
		approvedBySelectChoices.clearChoices(); // Очищаємо старі результати
		approvedBySelectChoices.setChoices(results, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник на пошук
	document.querySelector('#approvedBySelect').addEventListener('search', (event) => {
		// console.log(event.detail.value);
		approvedBySelectSearchDropdown(event.detail.value); // `detail.value` contains user input
	});

	// Додаємо обробник на вибір персони
	document.querySelector('#approvedBySelect').addEventListener('change', async (event) => {
		const select = document.getElementById('approvedBySelect');
		const wpInvolvedPersonId = select.getAttribute('data-wpInvolvedPersonId');
		const wpId = select.getAttribute('data-wpId');

		if (wpInvolvedPersonId) {
			await selectapprovedBy(wpInvolvedPersonId, event.target.value, wpId);
		} else {
			await selectNewapprovedBy(null, event.target.value, wpId);
		}
	});
};