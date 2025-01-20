const educationalProgramSelectHandler = async () => {
	const educationalProgramIdsSelect = document.querySelector('#educationalProgramIdsSelect');
	const wpId = educationalProgramIdsSelect.getAttribute('data-wpId');
	const rawSelectedEducationalProgramIds = JSON.parse(educationalProgramIdsSelect.getAttribute('data-educationalProgramIds'));
	const selectedEducationalProgramIds = rawSelectedEducationalProgramIds.map(id => Number(id));

	// Очищаємо всі наявні опції та ініціалізуємо Choices.js
	const educationalProgramIdsSelectChoices = await createNewSelectWithSearch('#educationalProgramIdsSelect'); // Перезапускаємо Choices.js

	const educationalProgramIdsSelectSearchDropdown = async (inputValue) => {
		if (inputValue.length < 3) {
			educationalProgramIdsSelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		// Спочатку отримуємо факультети з бекенду
		const results = await fetchEducationalPrograms(inputValue);

		educationalProgramIdsSelectChoices.clearChoices(); // Очищаємо старі результати

		const options = results.map(educationalProgram => {
			return new Option(educationalProgram.label, educationalProgram.value, educationalProgram.value === selectedEducationalProgramIds, educationalProgram.value === selectedEducationalProgramIds);
		});

		educationalProgramIdsSelectChoices.setChoices(options, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник події для пошуку
	educationalProgramIdsSelect.addEventListener('search', (event) => {
		educationalProgramIdsSelectSearchDropdown(event.detail.value); // `detail.value` містить введене значення
	});

	// Додаємо обробник події для вибору факультету
	educationalProgramIdsSelect.addEventListener('change', async () => {
		const updatedEvent = {
			target: {
				name: 'educationalProgramIds',
				value: JSON.stringify(educationalProgramIdsSelectChoices.getValue(true))
			}
		};

		await updateGeneralInfo(updatedEvent, wpId, true);
	});

	if (selectedEducationalProgramIds) {
		const results = await fetchEducationalProgramsByIds(selectedEducationalProgramIds);

		// Заповнюємо список опцій, включаючи попередньо вибранi навчальні програми
		const options = results.map(educationalProgram => {
			return new Option(educationalProgram.label, educationalProgram.value, selectedEducationalProgramIds.includes(educationalProgram.value), selectedEducationalProgramIds.includes(educationalProgram.value));
		});

		educationalProgramIdsSelectChoices.setChoices(options, 'value', 'label', true);  // Встановлюємо опції з попередньо вибраним значенням
	}
};
