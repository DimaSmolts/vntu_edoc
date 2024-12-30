const createNewAdditionalTasks = async (semesterId) => {
    const taskNameInput = document.getElementById(`taskName${semesterId}`);

    const postData = {
        semesterId,
        taskName: taskNameInput.value
    };

    const response = await fetch(`api/createNewAdditionalTasks`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    })

    const data = await response.json();

    const additionalTaskIdsSelect = document.querySelector(`#additionalTaskIdsSelect${semesterId}`);
    const rawSelectedAdditionalTaskIds = JSON.parse(additionalTaskIdsSelect.getAttribute('data-additionalTaskIds'));
    const updatedTasksIds = JSON.stringify([...rawSelectedAdditionalTaskIds, data.taskTypeId]);
    additionalTaskIdsSelect.setAttribute('data-additionalTaskIds', updatedTasksIds);

    taskNameInput.value = '';

    const educationalDisciplineSemesterControlMethodsContent = document.getElementById('educationalDisciplineSemesterControlMethodsContent');

    const semestersIds = JSON.parse(educationalDisciplineSemesterControlMethodsContent.getAttribute('data-semestersIds'));

    semestersIds.forEach(semesterId => {
        additionalTaskSelectHandler(semesterId);
    });
}