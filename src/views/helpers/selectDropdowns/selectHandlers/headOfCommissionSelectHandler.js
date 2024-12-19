const headOfCommissionSelectHandler = async () => {
	const headOfCommissionSelect = document.getElementById('headOfCommissionSelect');
	const wpInvolvedPersonId = headOfCommissionSelect.getAttribute('data-wpInvolvedPersonId');
	const headOfCommissionId = headOfCommissionSelect.getAttribute('data-headOfCommissionId');
	const wpId = educationalProgramGuarantorSelect.getAttribute('data-wpId');

	const headOfCommissionSelectChoices = createNewSelectWithSearch('#headOfCommissionSelect');

	const headOfCommissionSelectSearchDropdown = async (inputValue) => {
		if (inputValue.length < 3) {
			headOfCommissionSelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		const results = await fetchTeachers(inputValue);
		headOfCommissionSelectChoices.clearChoices(); // Очищаємо старі результати
		headOfCommissionSelectChoices.setChoices(results, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник на пошук
	document.querySelector('#headOfCommissionSelect').addEventListener('search', (event) => {
		headOfCommissionSelectSearchDropdown(event.detail.value); // `detail.value` contains user input
	});

	// Додаємо обробник на вибір персони
	document.querySelector('#headOfCommissionSelect').addEventListener('change', async (event) => {
		if (wpInvolvedPersonId) {
			await selectHeadOfCommission(wpInvolvedPersonId, event.target.value, wpId);
		} else {
			await selectNewHeadOfCommission(null, event.target.value, wpId);
		}
	});

	if (headOfCommissionId) {
		const result = await fetchTeacherById(Number(headOfCommissionId));

		const options = [result].map(option => {
			return new Option(option.label, option.value, Number(headOfCommissionId) === option.value, Number(headOfCommissionId) === option.value);

		});

		headOfCommissionSelectChoices.setChoices(options, 'value', 'label', true);
	}
};