const preloadTeachers = (selectedId) => {
    const teacherDropdown = document.getElementById("teacherDropdown");
    fetch(`api/getTeachers.php`, {
        method: 'GET'
    })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                data.message.forEach(item => {
                    const option = document.createElement("option");
                    option.textContent = `${item.surname} ${item.firstName} ${item.patronymicName}, ${item.degree}, ${item.position}`;
                    option.value = item.id;

                    if (item.id === selectedId) {
                        option.selected = true;
                    }

                    teacherDropdown.appendChild(option);
                });
            }
        })
}

const selectTeacher = (teacherId) => {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');

    const postData = {
        id,
        field: 'createdById',
        value: teacherId
    };

    updateWP(postData);
} 