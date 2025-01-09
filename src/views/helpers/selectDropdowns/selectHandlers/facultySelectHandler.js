const facultySelectHandler = async () => {
	const facultyIdSelect = document.querySelector('#facultyIdSelect');
	const wpId = facultyIdSelect.getAttribute('data-wpId');
	const selectedFacultyId = Number(facultyIdSelect.getAttribute('data-facultyId'));

	// Очищаємо всі наявні опції та ініціалізуємо Choices.js
	const facultyIdSelectChoices = await createNewSelect('#facultyIdSelect'); // Перезапускаємо Choices.js

	// Спочатку отримуємо факультети з бекенду
	const results = await fetchFaculties();

	const options = results.map(faculty => {
		return new Option(faculty.label, faculty.value, faculty.value === selectedFacultyId, faculty.value === selectedFacultyId);
	});

	// Перезапускаємо Choices.js для оновлення випадаючого списку з правильними варіантами
	facultyIdSelectChoices.setChoices(options, 'value', 'label', true);

	// Додаємо обробник події для вибору факультету
	facultyIdSelect.addEventListener('change', async (event) => {
		event.target.name = 'facultyId';

		await updateGeneralInfo(event, wpId, true);
	});
};
