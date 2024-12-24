const examTypeSelectHandler = async (semesterId) => {
	const examTypeIdSelect = document.querySelector(`#examType${semesterId}IdSelect`);
	const selectedExamTypeId = Number(examTypeIdSelect.getAttribute('data-examTypeId'));

	// Спочатку отримуємо факультети з бекенду
	const results = await fetchExamTypes();

	// Очищаємо всі наявні опції та ініціалізуємо Choices.js
	const examTypeIdSelectChoices = createNewSelect(`#examType${semesterId}IdSelect`); // Перезапускаємо Choices.js

	const options = results.map(examType => {
		return new Option(examType.label, examType.value, examType.value === selectedExamTypeId, examType.value === selectedExamTypeId);
	});

	// Перезапускаємо Choices.js для оновлення випадаючого списку з правильними варіантами
	examTypeIdSelectChoices.setChoices(options, 'value', 'label', true);

	// Додаємо обробник події для вибору факультету
	examTypeIdSelect.addEventListener('change', async (event) => {
		event.target.name = 'examTypeId';

		await updateSemesterInfo(event, semesterId);
	});
};
