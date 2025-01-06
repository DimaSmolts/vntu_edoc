const updateControlWorkPoints = (event, semesterId, moduleId, taskTypeId, modulesIds) => {
    // Оновлюємо значення в БД
    updateModuleTaskPoints(event, moduleId, taskTypeId)

    // Оновлюємо значання колонки Разом для семестра у рядку Контрольні роботи
    const controlWorkSemesterCell = document.getElementById(`controlWorkSemester${semesterId}`);

    let controlWorkSemester = 0;

    modulesIds.forEach(id => {
        const controlWorkModuleCell = document.getElementById(`controlWorkModule${id}`);
        if (Number(controlWorkModuleCell?.value)) {
            controlWorkSemester += Number(controlWorkModuleCell.value) ?? 0;
        }
    });

    controlWorkSemesterCell.innerText = controlWorkSemester;

    // Оновлюємо рядок Усього за модуль
    // Стовпець для даного модуля
    updateTotalByModuleCell(moduleId);
    // Стовпець Разом для семестра
    updateTotalBySemesterCell(semesterId, modulesIds);

    // Рядок Всього для семестра
    updateFullTotalBySemesterCell(semesterId, modulesIds);
}