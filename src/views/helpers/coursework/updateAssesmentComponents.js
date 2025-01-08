const updateAssesmentComponents = (event, semesterId, taskTypeId) => {
    const container = document.getElementById(`assesmentComponents${semesterId}`);

    const componentsInputs = container.querySelectorAll('.assesment-components-inputs');

    const componentsInputsMap = new Map;

    let pointsTotal = 0;

    componentsInputs.forEach(inputs => {
        const name = inputs.querySelector('input[name=assesmentComponentName]');
        const points = inputs.querySelector('input[name=assesmentComponentPoints]');

        pointsTotal += Number(points.value);

        componentsInputsMap.set(name.value, points.value);
    })

    const assessmentComponents = Object.fromEntries(componentsInputsMap);

    const postData = {
        semesterId,
        taskTypeId,
        assessmentComponents,
    };

    makePostRequest({
        link: 'api/updateAssesmentComponents',
        postData,
        responseOKHandler: updateValidation
    });

    const assesmentComponentTotalValueElement = document.getElementById(`assesmentComponentTotalValue${semesterId}`);

    assesmentComponentTotalValueElement.innerText = pointsTotal;
}