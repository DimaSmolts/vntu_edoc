const docApprovedBySelectHandler = () => {
	const docApprovedBySelectChoices = createNewSelect('#docApprovedBySelect');

	const docApprovedBySelectSearchDropdown = async (inputValue) => {
		if (inputValue.length < 3) {
			docApprovedBySelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		const results = await fetchSearchTeachersResults(inputValue);
		docApprovedBySelectChoices.clearChoices(); // Очищаємо старі результати
		docApprovedBySelectChoices.setChoices(results, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник на пошук
	document.querySelector('#docApprovedBySelect').addEventListener('search', (event) => {
		// console.log(event.detail.value);
		docApprovedBySelectSearchDropdown(event.detail.value); // `detail.value` contains user input
	});

	// Додаємо обробник на вибір персони
	document.querySelector('#docApprovedBySelect').addEventListener('change', async (event) => {
		const select = document.getElementById('docApprovedBySelect');
		const wpInvolvedPersonId = select.getAttribute('data-wpInvolvedPersonId');
		const wpId = select.getAttribute('data-wpId');

		if (wpInvolvedPersonId) {
			await selectDocApprovedBy(wpInvolvedPersonId, event.target.value, wpId);
		} else {
			await selectNewDocApprovedBy(null, event.target.value, wpId);
		}
	});
};