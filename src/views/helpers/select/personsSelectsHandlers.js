document.addEventListener('DOMContentLoaded', function () {
	const educationalProgramGuarantorSelectChoices = new Choices('#educationalProgramGuarantorSelect', {
		searchEnabled: true,
		searchResultLimit: 10,
		shouldSort: false,
		removeItemButton: true,
	});

	const fetchResults = async (query) => {
		const response = await fetch(`searchTeachers?query=${encodeURIComponent(query)}`);
		const data = await response.json();
		console.log(data);
		return data.map(teacher => ({
			value: teacher.id,
			label: `${teacher.t_name}, ${teacher.position.name}`,
		}));
	};

	const educationalProgramGuarantorSelectSearchDropdown = async (inputValue) => {
		if (inputValue.length < 3) {
			educationalProgramGuarantorSelectChoices.clearChoices(); // Очищаємо результати, якщо введено менше 3 символів
			return;
		}

		const results = await fetchResults(inputValue);
		educationalProgramGuarantorSelectChoices.clearChoices(); // Очищаємо старі результати
		educationalProgramGuarantorSelectChoices.setChoices(results, 'value', 'label', true); // Додаємо нові результати
	};

	// Додаємо обробник на пошук
	document.querySelector('#educationalProgramGuarantorSelect').addEventListener('search', (event) => {
		// console.log(event.detail.value);
		educationalProgramGuarantorSelectSearchDropdown(event.detail.value); // `detail.value` contains user input
	});

	// Додаємо обробник на вибір персони
	document.querySelector('#educationalProgramGuarantorSelect').addEventListener('change', async (event) => {
		const select = document.getElementById('educationalProgramGuarantorSelect');
		const wpInvolvedPersonId = select.getAttribute('data-wpInvolvedPersonId');
		const wpId = select.getAttribute('data-wpId');

		console.log({
			wpInvolvedPersonId,
			wpId,
			value: event.target.value
		})

		if (wpInvolvedPersonId) {
			await selectEducationalProgramGuarantor(wpInvolvedPersonId, event.target.value, wpId);
		} else {
			await selectNewEducationalProgramGuarantor(null, event.target.value, wpId);
		}
	});
});