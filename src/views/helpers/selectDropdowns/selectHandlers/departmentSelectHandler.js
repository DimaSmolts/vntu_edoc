const departmentSelectHandler = async () => {
	const departmentIdSelect = document.querySelector('#departmentIdSelect');
	const wpId = departmentIdSelect.getAttribute('data-wpId');
	const selectedDepartmentId = Number(departmentIdSelect.getAttribute('data-departmentId'));

	// Очищаємо всі наявні опції та ініціалізуємо Choices.js
	const departmentIdSelectChoices = createNewSelectWithSearch('#departmentIdSelect'); // Перезапускаємо Choices.js

	const departmentIdSelectSearchDropdown = async (inputValue) => {
		if (inputValue.length < 3) {
			departmentIdSelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		// Спочатку отримуємо факультети з бекенду
		const results = await fetchDepartments(inputValue);

		departmentIdSelectChoices.clearChoices(); // Очищаємо старі результати

		const options = results.map(department => {
			return new Option(department.label, department.value, department.value === selectedDepartmentId, department.value === selectedDepartmentId);
		});

		departmentIdSelectChoices.setChoices(options, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник події для пошуку
	departmentIdSelect.addEventListener('search', (event) => {
		departmentIdSelectSearchDropdown(event.detail.value); // `detail.value` містить введене значення
	});

	// Додаємо обробник події для вибору факультету
	departmentIdSelect.addEventListener('change', async (event) => {
		event.target.name = 'departmentId';

		await updateGeneralInfo(event, wpId, true);
	});

	if (selectedDepartmentId) {
		const results = await fetchDepartmentsById(selectedDepartmentId);  // Можна викликати це без параметра для отримання всіх факультетів

		// Заповнюємо список опцій, включаючи попередньо вибраний факультет
		const options = results.map(department => {
			return new Option(department.label, department.value, department.value === selectedDepartmentId, department.value === selectedDepartmentId);
		});

		departmentIdSelectChoices.setChoices(options, 'value', 'label', true);  // Встановлюємо опції з попередньо вибраним значенням
	}
};
