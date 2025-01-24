const subjectTypeSelectHandler = async () => {
	const subjectTypeIdSelect = document.querySelector('#subjectTypeIdSelect');
	const wpId = subjectTypeIdSelect.getAttribute('data-wpId');
	const selectedSubjectTypeId = Number(subjectTypeIdSelect.getAttribute('data-subjectTypeId'));

	// Очищаємо всі наявні опції та ініціалізуємо Choices.js
	const subjectTypeIdSelectChoices = await createNewSelect('#subjectTypeIdSelect'); // Перезапускаємо Choices.js

	// Спочатку отримуємо факультети з бекенду
	const results = await fetchSubjectTypes();

	const options = results.map(subjectType => {
		return new Option(subjectType.label, subjectType.value, subjectType.value === selectedSubjectTypeId, subjectType.value === selectedSubjectTypeId);
	});

	// Перезапускаємо Choices.js для оновлення випадаючого списку з правильними варіантами
	subjectTypeIdSelectChoices.setChoices(options, 'value', 'label', true);

	// Додаємо обробник події для вибору факультету
	subjectTypeIdSelect.addEventListener('change', async (event) => {
		event.target.name = 'subjectTypeId';

		await updateGeneralInfo(event, wpId, true);
	});
};
