const updateFullTotalBySemesterCell = (semesterId) => {
    const fullTotalByModuleCell = document.getElementById(`fullSemester${semesterId}Total`);

    let totalByModule = 0;

    const semesterTotalCell = document.getElementById(`semester${semesterId}Total`);
    const examCell = document.getElementById(`examSemester${semesterId}`);

    if (semesterTotalCell) {
        totalByModule += Number(semesterTotalCell.innerText);
    }

    if (examCell) {
        totalByModule += Number(examCell?.value) ?? 0;
    }

    fullTotalByModuleCell.innerText = totalByModule;
}