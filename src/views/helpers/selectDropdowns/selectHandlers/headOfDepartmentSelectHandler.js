const headOfDepartmentSelectHandler = async () => {
	const headOfDepartmentSelect = document.getElementById('headOfDepartmentSelect');
	const wpInvolvedPersonId = headOfDepartmentSelect.getAttribute('data-wpInvolvedPersonId');
	const headOfDepartmentId = headOfDepartmentSelect.getAttribute('data-headOfDepartmentId');
	const wpId = headOfDepartmentSelect.getAttribute('data-wpId');

	const headOfDepartmentSelectChoices = createNewSelectWithSearch('#headOfDepartmentSelect');

	const headOfDepartmentSelectSearchDropdown = async (inputValue) => {
		if (inputValue.length < 3) {
			headOfDepartmentSelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		const results = await fetchTeachers(inputValue);
		headOfDepartmentSelectChoices.clearChoices(); // Очищаємо старі результати
		headOfDepartmentSelectChoices.setChoices(results, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник на пошук
	document.querySelector('#headOfDepartmentSelect').addEventListener('search', (event) => {
		headOfDepartmentSelectSearchDropdown(event.detail.value);
	});

	// Додаємо обробник на вибір персони
	document.querySelector('#headOfDepartmentSelect').addEventListener('change', async (event) => {
		if (wpInvolvedPersonId) {
			await selectHeadOfDepartment(wpInvolvedPersonId, event.target.value, wpId);
		} else {
			await selectNewHeadOfDepartment(null, event.target.value, wpId);
		}
	});

	if (headOfDepartmentId) {
		const result = await fetchTeacherById(Number(headOfDepartmentId));

		const options = [result].map(option => {
			return new Option(option.label, option.value, Number(headOfDepartmentId) === option.value, Number(headOfDepartmentId) === option.value);

		});

		headOfDepartmentSelectChoices.setChoices(options, 'value', 'label', true);
	}
};