const updateTaskPoints = async (event, semesterId, taskDetailsId, additionalTasks = []) => {
	// Оновлюємо значення в БД
	const postData = {
		points: event.target.value,
		semesterId,
		taskDetailsId
	};

    makePostRequest({
        link: 'api/updateTaskPointsById',
        postData,
		responseOKHandler: updateValidation
    });

	// Оновлюємо Усього за модуль для семестра
	updateTotalBySemesterCell(semesterId, additionalTasks);

	// Оновлюємо Всього для семестра
	updateFullTotalBySemesterCell(semesterId);
}