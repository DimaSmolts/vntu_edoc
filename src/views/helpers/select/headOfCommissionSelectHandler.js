const headOfCommissionSelectHandler = () => {
	const headOfCommissionSelectChoices = createNewSelect('#headOfCommissionSelect');

	const headOfCommissionSelectSearchDropdown = async (inputValue) => {
		if (inputValue.length < 3) {
			headOfCommissionSelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		const results = await fetchSearchTeachersResults(inputValue);
		headOfCommissionSelectChoices.clearChoices(); // Очищаємо старі результати
		headOfCommissionSelectChoices.setChoices(results, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник на пошук
	document.querySelector('#headOfCommissionSelect').addEventListener('search', (event) => {
		// console.log(event.detail.value);
		headOfCommissionSelectSearchDropdown(event.detail.value); // `detail.value` contains user input
	});

	// Додаємо обробник на вибір персони
	document.querySelector('#headOfCommissionSelect').addEventListener('change', async (event) => {
		const select = document.getElementById('headOfCommissionSelect');
		const wpInvolvedPersonId = select.getAttribute('data-wpInvolvedPersonId');
		const wpId = select.getAttribute('data-wpId');

		if (wpInvolvedPersonId) {
			await selectHeadOfCommission(wpInvolvedPersonId, event.target.value, wpId);
		} else {
			await selectNewHeadOfCommission(null, event.target.value, wpId);
		}
	});
};