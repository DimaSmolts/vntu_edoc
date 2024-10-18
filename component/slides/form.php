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
        <?php require_once 'generalunivercityinfo.php'; ?>
    </form>
    
    <script>
    	const saveInfo = (e) => {
    		console.log(event.target.id)
    	}
    </script>
</body>
</html>