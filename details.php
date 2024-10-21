<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="component/styles/form.css">
</head>
<body>
    <?php
    require_once 'component/slides/form.php';
    ?>
    
    <script src="helpers/convertFormInfoApiResult.js"></script>
    <script src="helpers/mapValuesToFields.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            const id = urlParams.get('id');
            
            fetch(`api/getFormInfo.php?id=${id}`, {
                method: 'GET'
            })
            .then(response => response.json())
            .then(data  => {
                if (data) {
                    const convertedData = convertFormInfoApiResult(data.message[0]);
                    mapValuesToFields(convertedData);
                } else {
                    console.error('No JSON response received');
                }
            })
            .catch(error => console.error('Fetch error:', error));
            
            
            fetch(`../../api/getFormInfo.php?id=${id}`, {
                method: 'GET'
            })
            .then(response => response.json())
            .then(data  => {
                if (data) {
                    const educationalProgram = data.message[0][7];
                    console.log(data.message[0])
                    
                    const educationalProgramInput = document.getElementById("educationalProgram");
                    educationalProgramInput.value = educationalProgram;
                } else {
                    console.error('No JSON response received');
                }
            })
            .catch(error => console.error('Fetch error:', error));
        });
    
        const saveInfo = (e) => {
            const urlParams = new URLSearchParams(window.location.search);
            const id = urlParams.get('id');
            
            const postData = {
                id,
                field: event.target.name,
                value: event.target.value
            };
            
            console.log(postData)
            
            fetch(`api/updateWPInfo.php`, {
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
                console.log(response)
            })
            .catch(error => console.error('Post error:', error));
        }
    </script>
</body>
</html>