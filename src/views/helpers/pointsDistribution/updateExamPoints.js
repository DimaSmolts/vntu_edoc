const updateExamPoints = (event, semesterId, wpId, semestersIds) => {
	// Оновлюємо значення в БД
	updateGeneralPoints(event, wpId, semestersIds);

	// Оновлюємо Всього для семестра
	updateFullTotalBySemesterCell(semesterId);
}