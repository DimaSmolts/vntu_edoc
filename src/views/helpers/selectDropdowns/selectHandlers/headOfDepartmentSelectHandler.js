const headOfDepartmentSelectHandler = () => {
	const headOfDepartmentSelectChoices = createNewSelectWithSearch('#headOfDepartmentSelect');

	const headOfDepartmentSelectSearchDropdown = async (inputValue) => {
		if (inputValue.length < 3) {
			headOfDepartmentSelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		const results = await fetchSearchTeachersResults(inputValue);
		headOfDepartmentSelectChoices.clearChoices(); // Очищаємо старі результати
		headOfDepartmentSelectChoices.setChoices(results, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник на пошук
	document.querySelector('#headOfDepartmentSelect').addEventListener('search', (event) => {
		// console.log(event.detail.value);
		headOfDepartmentSelectSearchDropdown(event.detail.value); // `detail.value` contains user input
	});

	// Додаємо обробник на вибір персони
	document.querySelector('#headOfDepartmentSelect').addEventListener('change', async (event) => {
		const select = document.getElementById('headOfDepartmentSelect');
		const wpInvolvedPersonId = select.getAttribute('data-wpInvolvedPersonId');
		const wpId = select.getAttribute('data-wpId');

		if (wpInvolvedPersonId) {
			await selectHeadOfDepartment(wpInvolvedPersonId, event.target.value, wpId);
		} else {
			await selectNewHeadOfDepartment(null, event.target.value, wpId);
		}
	});
};