const educationalProgramGuarantorSelectHandler = () => {
	const educationalProgramGuarantorSelectChoices = createNewSelectWithSearch('#educationalProgramGuarantorSelect');

	const educationalProgramGuarantorSelectSearchDropdown = async (inputValue) => {
		if (inputValue.length < 3) {
			educationalProgramGuarantorSelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		const results = await fetchSearchTeachersResults(inputValue);
		educationalProgramGuarantorSelectChoices.clearChoices(); // Очищаємо старі результати
		educationalProgramGuarantorSelectChoices.setChoices(results, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник на пошук
	document.querySelector('#educationalProgramGuarantorSelect').addEventListener('search', (event) => {
		educationalProgramGuarantorSelectSearchDropdown(event.detail.value);
	});

	// Додаємо обробник на вибір персони
	document.querySelector('#educationalProgramGuarantorSelect').addEventListener('change', async (event) => {
		const select = document.getElementById('educationalProgramGuarantorSelect');
		const wpInvolvedPersonId = select.getAttribute('data-wpInvolvedPersonId');
		const wpId = select.getAttribute('data-wpId');

		if (wpInvolvedPersonId) {
			await selectEducationalProgramGuarantor(wpInvolvedPersonId, event.target.value, wpId);
		} else {
			await selectNewEducationalProgramGuarantor(null, event.target.value, wpId);
		}
	});
};