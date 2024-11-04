<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="component/styles/common.css">
    <link rel="stylesheet" href="component/styles/carousel.css">
</head>

<body>
    <main class="container">
        <?php
        require_once 'component/carousel.php';
        ?>

        <script src="helpers/convertFormInfoApiResult.js"></script>
        <script src="helpers/mapValuesToFields.js"></script>
        <script src="helpers/carousel.js"></script>
        <script src="helpers/preloading/preloadDetails.js"></script>
        <script src="helpers/updating/updateWP.js"></script>
        <script src="helpers/updating/updateGeneralInfo.js"></script>
        <script src="helpers/updating/updateED.js"></script>
        <script src="helpers/updating/updateEDInfo.js"></script>
        <script src="helpers/addEFForm.js"></script>
        <script src="helpers/search/teacher.js"></script>
    </main>
</body>

</html>