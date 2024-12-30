const specialtySelectHandler = async () => {
	const specialtyIdsSelect = document.querySelector('#specialtyIdsSelect');
	const wpId = specialtyIdsSelect.getAttribute('data-wpId');
	const rawSelectedSpecialtyIds = JSON.parse(specialtyIdsSelect.getAttribute('data-specialtyIds'));
	const selectedSpecialtyIds = rawSelectedSpecialtyIds.map(id => Number(id));

	// Очищаємо всі наявні опції та ініціалізуємо Choices.js
	const specialtyIdsSelectChoices = createNewSelectWithSearch('#specialtyIdsSelect'); // Перезапускаємо Choices.js

	const specialtyIdsSelectSearchDropdown = async (inputValue) => {
		if (inputValue.length < 3) {
			specialtyIdsSelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		// Спочатку отримуємо факультети з бекенду
		const results = await fetchSpecialties(inputValue);

		specialtyIdsSelectChoices.clearChoices(); // Очищаємо старі результати

		const options = results.map(specialty => {
			return new Option(specialty.label, specialty.value, selectedSpecialtyIds.includes(specialty.value), selectedSpecialtyIds.includes(specialty.value));
		});

		specialtyIdsSelectChoices.setChoices(options, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник події для пошуку
	specialtyIdsSelect.addEventListener('search', (event) => {
		specialtyIdsSelectSearchDropdown(event.detail.value); // `detail.value` містить введене значення
	});

	// Додаємо обробник події для вибору факультету
	specialtyIdsSelect.addEventListener('change', async () => {
		const updatedEvent = {
			target: {
				name: 'specialtyIds',
				value: JSON.stringify(specialtyIdsSelectChoices.getValue(true))
			}
		};

		await updateGeneralInfo(updatedEvent, wpId);
	});

	if (selectedSpecialtyIds) {
		const results = await fetchSpecialtiesByIds(selectedSpecialtyIds);

		// Заповнюємо список опцій, включаючи попередньо вибранi спеціальності
		const options = results.map(specialty => {
			return new Option(specialty.label, specialty.value, selectedSpecialtyIds.includes(specialty.value), selectedSpecialtyIds.includes(specialty.value));
		});

		specialtyIdsSelectChoices.setChoices(options, 'value', 'label', true);  // Встановлюємо опції з попередньо вибраним значенням
	}
};
