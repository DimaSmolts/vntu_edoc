const updateExamPoints = (event, semesterId) => {
	// Оновлюємо значення в БД
	updateGeneralPoints(event, semesterId);

	// Оновлюємо Всього для семестра
	updateFullTotalBySemesterCell(semesterId);
}