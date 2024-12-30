const updateAssesmentComponents = (event, semesterId, taskTypeId) => {
    const container = document.getElementById(`assesmentComponents${semesterId}`);

    const componentsInputs = container.querySelectorAll('.assesment-components-inputs');

    const componentsInputsMap = new Map;

    componentsInputs.forEach(inputs => {
        const name = inputs.querySelector('input[name=assesmentComponentName]');
        const points = inputs.querySelector('input[name=assesmentComponentPoints]');

        componentsInputsMap.set(name.value, points.value);
    })

    const assessmentComponents = Object.fromEntries(componentsInputsMap);

    const postData = {
        semesterId,
        taskTypeId,
        assessmentComponents,
    };
    console.log(postData);

    fetch(`api/updateAssesmentComponents`, {
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