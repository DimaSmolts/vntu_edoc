const updateTotalBySemesterCell = (semesterId) => {
    const totalByModuleCell = document.getElementById(`semester${semesterId}Total`);

    let totalBySemester = 0;

    const practicalCell = document.getElementById(`practicalSemester${semesterId}`);
    const labCell = document.getElementById(`labSemester${semesterId}`);
    const seminarCell = document.getElementById(`seminarSemester${semesterId}`);
    const colloquiumCell = document.getElementById(`colloquiumSemester${semesterId}`);

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

    totalByModuleCell.innerText = totalBySemester;
}