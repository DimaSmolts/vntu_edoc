const stydingLevelSelectHandler = async () => {
	const stydingLevelIdSelect = document.querySelector('#stydingLevelIdSelect');
	const wpId = stydingLevelIdSelect.getAttribute('data-wpId');
	const selectedStydingLevelId = Number(stydingLevelIdSelect.getAttribute('data-stydingLevelId'));

	// Спочатку отримуємо факультети з бекенду
	const results = await fetchStydingLevelTypes();

	// Очищаємо всі наявні опції та ініціалізуємо Choices.js
	const stydingLevelIdSelectChoices = createNewSelect('#stydingLevelIdSelect'); // Перезапускаємо Choices.js

	const options = results.map(faculty => {
		return new Option(faculty.label, faculty.value, faculty.value === selectedStydingLevelId, faculty.value === selectedStydingLevelId);
	});

	// Перезапускаємо Choices.js для оновлення випадаючого списку з правильними варіантами
	stydingLevelIdSelectChoices.setChoices(options, 'value', 'label', true);

	// Додаємо обробник події для вибору факультету
	stydingLevelIdSelect.addEventListener('change', async (event) => {
		event.target.name = 'stydingLevelId';

		await updateGeneralInfo(event, wpId, true);
	});
};
