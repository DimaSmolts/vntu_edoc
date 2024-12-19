const approvedBySelectHandler = async () => {
	const approvedBySelect = document.getElementById('approvedBySelect');
	const wpInvolvedPersonId = approvedBySelect.getAttribute('data-wpInvolvedPersonId');
	const approvedById = approvedBySelect.getAttribute('data-approvedById');
	const wpId = approvedBySelect.getAttribute('data-wpId');

	const approvedBySelectChoices = createNewSelectWithSearch('#approvedBySelect');

	const approvedBySelectSearchDropdown = async (inputValue) => {
		if (inputValue.length < 3) {
			approvedBySelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		const results = await fetchTeachers(inputValue);
		approvedBySelectChoices.clearChoices(); // Очищаємо старі результати
		approvedBySelectChoices.setChoices(results, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник на пошук
	document.querySelector('#approvedBySelect').addEventListener('search', (event) => {
		approvedBySelectSearchDropdown(event.detail.value); // `detail.value` contains user input
	});

	// Додаємо обробник на вибір персони
	document.querySelector('#approvedBySelect').addEventListener('change', async (event) => {
		if (wpInvolvedPersonId) {
			await selectApprovedBy(wpInvolvedPersonId, event.target.value, wpId);
		} else {
			await selectNewApprovedBy(null, event.target.value, wpId);
		}
	});

	if (approvedById) {
		const result = await fetchTeacherById(Number(approvedById));

		const options = [result].map(option => {
			return new Option(option.label, option.value, Number(approvedById) === option.value, Number(approvedById) === option.value);

		});

		approvedBySelectChoices.setChoices(options, 'value', 'label', true);
	}
};