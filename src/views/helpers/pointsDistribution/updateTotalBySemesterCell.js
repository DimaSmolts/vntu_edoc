const updateTotalBySemesterCell = (semesterId, additionalTasks = []) => {
    const totalByModuleCell = document.getElementById(`semester${semesterId}Total`);

    let totalBySemester = 0;

    const practicalCell = document.getElementById(`practicalSemester${semesterId}`);
    const labCell = document.getElementById(`labSemester${semesterId}`);
    const seminarCell = document.getElementById(`seminarSemester${semesterId}`);
    const colloquiumCell = document.getElementById(`colloquiumSemester${semesterId}`);
    const controlWorkCell = document.getElementById(`controlWorkSemester${semesterId}`);
    const calculationAndGraphicTypeTaskCell = document.getElementById(`calculationAndGraphicTypeTaskSemester${semesterId}`);

    if (practicalCell) {
        totalBySemester += Number(practicalCell.innerText);
    }

    if (labCell) {
        totalBySemester += Number(labCell.innerText);
    }

    if (seminarCell) {
        totalBySemester += Number(seminarCell.innerText);
    }

    if (colloquiumCell) {
        totalBySemester += Number(colloquiumCell.innerText);
    }

    if (controlWorkCell) {
        totalBySemester += Number(controlWorkCell.innerText);
    }

    if (calculationAndGraphicTypeTaskCell) {
        totalBySemester += Number(calculationAndGraphicTypeTaskCell?.value) ?? 0;
    }

    if (additionalTasks.length > 0) {
        additionalTasks.forEach(task => {
            const taskCell = document.getElementById(`additionalTask${task.taskDetailsId}`);

            if (taskCell) {
                totalBySemester += Number(taskCell?.value) ?? 0;
            }
        })
    }

    totalByModuleCell.innerText = totalBySemester;
}