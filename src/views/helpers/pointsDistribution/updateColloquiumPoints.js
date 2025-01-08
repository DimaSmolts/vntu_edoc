const updateColloquiumPoints = (event, semesterId, moduleId, taskTypeId, modulesIds, additionalTasks) => {
    // Оновлюємо значення в БД
    updateModuleTaskPoints(event, moduleId, taskTypeId)

    // Оновлюємо значання колонки Разом для семестра у рядку Колоквіуми
    const colloquiumSemesterCell = document.getElementById(`colloquiumSemester${semesterId}`);

    let colloquiumSemester = 0;

    modulesIds.forEach(id => {
        const colloquiumModuleCell = document.getElementById(`colloquiumModule${id}`);
        if (Number(colloquiumModuleCell?.value)) {
            colloquiumSemester += Number(colloquiumModuleCell.value) ?? 0;
        }
    });

    colloquiumSemesterCell.innerText = colloquiumSemester;

    // Оновлюємо рядок Усього за модуль
    // Стовпець для даного модуля
    updateTotalByModuleCell(moduleId);
    // Стовпець Разом для семестра
    updateTotalBySemesterCell(semesterId, additionalTasks);

    // Рядок Всього для семестра
    updateFullTotalBySemesterCell(semesterId, modulesIds);
}