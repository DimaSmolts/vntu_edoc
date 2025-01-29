const educationalProgramSelectHandler = async (idx, shouldDestroy = false) => {
	const educationalProgramIdsSelect = document.querySelector(`#educationalProgramIdsSelect${idx}`);

	// Перевіряємо, чи Choices.js вже ініціалізований
	if (educationalProgramIdsSelect.choicesInstance && shouldDestroy) {
		educationalProgramIdsSelect.choicesInstance.destroy(); // Знищуємо Choices.js інстанс
		educationalProgramIdsSelect.innerHTML = ''; // Очищаємо всі опції
	}

	const wpId = educationalProgramIdsSelect.getAttribute('data-wpId');
	const rawSelectedEducationalProgramIds = educationalProgramIdsSelect.getAttribute('data-educationalProgramIds');
	const selectedEducationalProgramIds = rawSelectedEducationalProgramIds ? JSON.parse(rawSelectedEducationalProgramIds)?.map(id => Number(id)) : null;

	// Створюємо новий Choices.js після очищення
	const educationalProgramIdsSelectChoices = await createNewSelectWithSearch(`#educationalProgramIdsSelect${idx}`);

	// Зберігаємо новий інстанс Choices.js у властивість елемента
	educationalProgramIdsSelect.choicesInstance = educationalProgramIdsSelectChoices;

	const educationalProgramIdsSelectSearchDropdown = async (inputValue, specialtyId) => {
		if (inputValue.length < 3) {
			educationalProgramIdsSelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		const results = await fetchEducationalPrograms(inputValue, specialtyId);

		educationalProgramIdsSelectChoices.clearChoices(); // Очищаємо старі результати

		const options = results.map(educationalProgram => {
			return new Option(educationalProgram.label, educationalProgram.value, educationalProgram.value === selectedEducationalProgramIds, educationalProgram.value === selectedEducationalProgramIds);
		});

		educationalProgramIdsSelectChoices.setChoices(options, 'value', 'label', true);
	};

	educationalProgramIdsSelect.addEventListener('search', (event) => {
		const existedSpecialtyIdSelect = document.querySelector(`#specialtyIdSelect${idx}`);
		const specialtyId = Number(existedSpecialtyIdSelect.getAttribute('data-specialtyId'));

		educationalProgramIdsSelectSearchDropdown(event.detail.value, specialtyId);
	});

	educationalProgramIdsSelect.addEventListener('change', async () => {
		const specialtyContainer = document.querySelector('#specialtyContainer');
		const rawIndexes = JSON.parse(specialtyContainer.getAttribute('data-indexes'));
		const indexes = rawIndexes.map(idx => Number(idx));

		let specId;
		let educationalProgramIds;

		const value = indexes.map(index => {
			const existedEducationalProgramIdsSelect = document.querySelector(`#educationalProgramIdsSelect${index}`);
			const existedSpecialtyIdSelect = document.querySelector(`#specialtyIdSelect${index}`);

			if (index === Number(idx)) {
				const updatedEducationalProgramIdsSelect = educationalProgramIdsSelectChoices.getValue(true);
				educationalProgramIdsSelect.setAttribute('data-educationalProgramIds', JSON.stringify(updatedEducationalProgramIdsSelect));

				educationalProgramIds = updatedEducationalProgramIdsSelect;
				specId = Number(existedSpecialtyIdSelect.getAttribute('data-specialtyId'));
			} else {
				specId = Number(existedSpecialtyIdSelect.getAttribute('data-specialtyId'));
				const rawSelectedEducationalProgramIds = JSON.parse(existedEducationalProgramIdsSelect.getAttribute('data-educationalProgramIds') ?? '');
				educationalProgramIds = rawSelectedEducationalProgramIds?.map(id => Number(id));
			}

			return {
				[index]: { "specialtyId": specId, "educationalProgramsIds": educationalProgramIds }
			};
		});

		const updatedEvent = {
			target: {
				name: 'specialtyWithEducationalProgramIds',
				value: JSON.stringify(value)
			}
		};

		await updateGeneralInfo(updatedEvent, wpId, true);
	});

	if (selectedEducationalProgramIds) {
		const results = await fetchEducationalProgramsByIds(selectedEducationalProgramIds);

		const options = results.map(educationalProgram => {
			return new Option(educationalProgram.label, educationalProgram.value, selectedEducationalProgramIds.includes(educationalProgram.value), selectedEducationalProgramIds.includes(educationalProgram.value));
		});

		educationalProgramIdsSelectChoices.setChoices(options, 'value', 'label', true);
	} else {
		educationalProgramIdsSelectChoices.clearChoices();
	}
};