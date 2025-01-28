const specialtySelectHandler = async (idx) => {
	const specialtyIdSelect = document.querySelector(`#specialtyIdSelect${idx}`);
	const wpId = specialtyIdSelect.getAttribute('data-wpId');
	const selectedSpecialtyId = Number(specialtyIdSelect.getAttribute('data-specialtyId'));

	// Очищаємо всі наявні опції та ініціалізуємо Choices.js
	const specialtyIdSelectChoices = await createNewSelectWithSearch(`#specialtyIdSelect${idx}`); // Перезапускаємо Choices.js

	const specialtyIdsSelectSearchDropdown = async (inputValue) => {
		if (inputValue.length < 3) {
			specialtyIdSelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		// Спочатку отримуємо факультети з бекенду
		const results = await fetchSpecialties(inputValue);

		specialtyIdSelectChoices.clearChoices(); // Очищаємо старі результати

		const options = results.map(specialty => {
			return {
				value: specialty.value.toString(),
				label: specialty.label,
				selected: specialty.value === selectedSpecialtyId,
			};
		});

		specialtyIdSelectChoices.setChoices(options, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник події для пошуку
	specialtyIdSelect.addEventListener('search', (event) => {
		specialtyIdsSelectSearchDropdown(event.detail.value); // `detail.value` містить введене значення
	});

	// Додаємо обробник події для вибору факультету
	specialtyIdSelect.addEventListener('change', async (event) => {
		const specialtyContainer = document.querySelector('#specialtyContainer');
		const rawIndexes = JSON.parse(specialtyContainer.getAttribute('data-indexes'));
		const indexes = rawIndexes.map(idx => Number(idx));

		const value = indexes.map(index => {
			const existedEducationalProgramIdsLabel = document.querySelector(`#educationalProgramIdsLabel${index}`);
			const existedEducationalProgramIdsSelect = document.querySelector(`#educationalProgramIdsSelect${index}`);
			const existedSpecialtyIdSelect = document.querySelector(`#specialtyIdSelect${index}`);

			let specId;
			let educationalProgramIds;

			if (index === Number(idx)) {
				specialtyIdSelect.setAttribute('data-specialtyId', event.target.value);
				specId = event.target.value ? event.target.value : null;
				existedEducationalProgramIdsSelect.setAttribute('data-educationalProgramIds', []);

				if (specId) {
					existedEducationalProgramIdsLabel.classList.remove('educational-program-invisible');
					existedEducationalProgramIdsLabel.classList.add('educational-program-visible');
				} else {
					existedEducationalProgramIdsLabel.classList.remove('educational-program-visible');
					existedEducationalProgramIdsLabel.classList.add('educational-program-invisible');
				}

				educationalProgramIds = [];
			} else {
				specId = Number(existedSpecialtyIdSelect.getAttribute('data-specialtyId'));

				const rawSelectedEducationalProgramIds = JSON.parse(existedEducationalProgramIdsSelect.getAttribute('data-educationalProgramIds') ?? '');
				educationalProgramIds = rawSelectedEducationalProgramIds?.map(id => Number(id));
			}

			return {
				[index]: { "specialtyId": specId, "educationalProgramsIds": educationalProgramIds }
			}
		});

		const updatedEvent = {
			target: {
				name: 'specialtyWithEducationalProgramIds',
				value: JSON.stringify(value)
			}
		};

		await updateGeneralInfo(updatedEvent, wpId, true);
	});

	if (selectedSpecialtyId) {
		const results = await fetchSpecialtiesById(selectedSpecialtyId);

		// Заповнюємо список опцій, включаючи попередньо вибранi спеціальності
		const options = results.map(specialty => {
			return {
				value: specialty.value.toString(),
				label: specialty.label,
				selected: specialty.value === selectedSpecialtyId,
			};
		});

		specialtyIdSelectChoices.setChoices(options, 'value', 'label', true);  // Встановлюємо опції з попередньо вибраним значенням
	}
};
