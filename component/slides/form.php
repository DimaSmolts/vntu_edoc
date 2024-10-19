<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/form.css">
</head>
<body>
    <form>
        <?php
        require_once 'generalUnivercityInfo.php';
        ?>
    </form>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('../../api/getFormInfo.php', {
                method: 'GET'
            })
            .then(response => response.json())
            .then(data  => {
                if (data) {
                    console.log(data)
                } else {
                    console.error('No JSON response received');
                }
            })
            .catch(error => console.error('Fetch error:', error));
        });
    
        const saveInfo = (e) => {
            
            console.log(event.target.value)
        }
    </script>
</body>
</html>