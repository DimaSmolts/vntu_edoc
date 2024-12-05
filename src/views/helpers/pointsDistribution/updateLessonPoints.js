const updateLessonPoints = (event, lessonType, wpId, semestersWithModules, semestersIds) => {
	// Оновлюємо значення в БД
	updateGeneralPoints(event, wpId, semestersIds);

	// Оновлюємо рядок по типу занять
	Object.entries(semestersWithModules).forEach(([semesterId, modules]) => {
		const semesterLessons = modules.totalLessons;
		delete modules.totalLessons;

		Object.entries(modules).forEach(([moduleId, lessons]) => {
			const moduleCell = document.getElementById(`${lessonType}Module${moduleId}`);

			moduleCell.innerText = event.target.value * lessons;

			// Оновлюємо Усього за модуль для модуля
			updateTotalByModuleCell(moduleId);
		})

		const semesterCell = document.getElementById(`${lessonType}Semester${semesterId}`);

		semesterCell.innerText = event.target.value * semesterLessons;

		// Оновлюємо Усього за модуль для семестра
		updateTotalBySemesterCell(semesterId);

		// Оновлюємо Всього для семестра
		updateFullTotalBySemesterCell(semesterId);
	})
}