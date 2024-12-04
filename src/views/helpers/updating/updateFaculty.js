const updateFaculty = async (event, id) => {
    const postData = {
        id,
        field: event.target.name,
        value: event.target.value
    };

    const response = await fetch('updateWPDetails', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(postData)
    })

    const data = await response.json();

    if (data.departmentDropdownLabel) {
        const departmentLabel = document.getElementById('departmentDropdownLabelContainer');
        if (departmentLabel) {
            departmentLabel.remove();
        }

        const facultyDropdownLabel = document.getElementById('facultyDropdownLabel');

        const newDropdownLabelContainer = createElement({
            elementName: 'div',
            id: "departmentDropdownLabelContainer",
            innerHTML: data.departmentDropdownLabel
        });

        facultyDropdownLabel.after(newDropdownLabelContainer);
    }
}