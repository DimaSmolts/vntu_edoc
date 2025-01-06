const updateTotalByModuleCell = (moduleId) => {
    const totalByModuleCell = document.getElementById(`module${moduleId}Total`);

    let totalByModule = 0;

    const practicalCell = document.getElementById(`practicalModule${moduleId}`);
    const labCell = document.getElementById(`labModule${moduleId}`);
    const seminarCell = document.getElementById(`seminarModule${moduleId}`);
    const colloquiumCell = document.getElementById(`colloquiumModule${moduleId}`);
    const controlWorkCell = document.getElementById(`controlWorkModule${moduleId}`);

    if (practicalCell) {
        totalByModule += Number(practicalCell.innerText);
    }

    if (labCell) {
        totalByModule += Number(labCell.innerText);
    }

    if (seminarCell) {
        totalByModule += Number(seminarCell.innerText);
    }

    if (colloquiumCell) {
        totalByModule += Number(colloquiumCell?.value) ?? 0;
    }

    if (controlWorkCell) {
        totalByModule += Number(controlWorkCell?.value) ?? 0;
    }

    totalByModuleCell.innerText = totalByModule;
}