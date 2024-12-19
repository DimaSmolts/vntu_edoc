const educationalProgramGuarantorSelectHandler = async () => {
	const educationalProgramGuarantorSelect = document.getElementById('educationalProgramGuarantorSelect');
	const wpInvolvedPersonId = educationalProgramGuarantorSelect.getAttribute('data-wpInvolvedPersonId');
	const educationalProgramGuarantorId = educationalProgramGuarantorSelect.getAttribute('data-educationalProgramGuarantorId');
	const wpId = educationalProgramGuarantorSelect.getAttribute('data-wpId');

	const educationalProgramGuarantorSelectChoices = createNewSelectWithSearch('#educationalProgramGuarantorSelect');

	const educationalProgramGuarantorSelectSearchDropdown = async (inputValue) => {
		if (inputValue.length < 3) {
			educationalProgramGuarantorSelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		const results = await fetchTeachers(inputValue);
		educationalProgramGuarantorSelectChoices.clearChoices(); // Очищаємо старі результати
		educationalProgramGuarantorSelectChoices.setChoices(results, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник на пошук
	document.querySelector('#educationalProgramGuarantorSelect').addEventListener('search', (event) => {
		educationalProgramGuarantorSelectSearchDropdown(event.detail.value);
	});

	// Додаємо обробник на вибір персони
	document.querySelector('#educationalProgramGuarantorSelect').addEventListener('change', async (event) => {
		if (wpInvolvedPersonId) {
			await selectEducationalProgramGuarantor(wpInvolvedPersonId, event.target.value, wpId);
		} else {
			await selectNewEducationalProgramGuarantor(null, event.target.value, wpId);
		}
	});

	if (educationalProgramGuarantorId) {
		const result = await fetchTeacherById(Number(educationalProgramGuarantorId));

		const options = [result].map(option => {
			return new Option(option.label, option.value, Number(educationalProgramGuarantorId) === option.value, Number(educationalProgramGuarantorId) === option.value);

		});

		educationalProgramGuarantorSelectChoices.setChoices(options, 'value', 'label', true);
	}
};