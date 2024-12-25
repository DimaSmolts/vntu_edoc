const updateAdditionalTasks = (event, semesterId) => {
    const container = document.getElementById(`additionalTaskComponents${semesterId}`);

    const componentsInputs = container.querySelectorAll('.additional-task-components-inputs');

    const additionalTasksComponents = [];

    componentsInputs.forEach(inputs => {
        additionalTasksComponents.push(inputs.querySelector('input[name=additionalTaskName]').value);
    })

    const postData = {
        semesterId,
        additionalTasksComponents
    };

    fetch(`api/updateAdditionalTasks`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
        })
        .catch(error => console.error('Post error:', error));
}