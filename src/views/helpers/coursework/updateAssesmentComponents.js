const updateAssesmentComponents = (event, semesterId, container, componentsName, typeName) => {
    const componentsInputs = container.querySelectorAll('.assesment-components-inputs');

    const componentsInputsMap = new Map;

    componentsInputs.forEach(inputs => {
        const name = inputs.querySelector('input[name=assesmentComponentName]');
        const points = inputs.querySelector('input[name=assesmentComponentPoints]');

        componentsInputsMap.set(name.value, points.value);
    })

    const courseworkAssessmentComponents = Object.fromEntries(componentsInputsMap);

    const postData = {
        semesterId,
        [componentsName]: courseworkAssessmentComponents
    };

    fetch(`api/update${typeName}AssesmentComponents`, {
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