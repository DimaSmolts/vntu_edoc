<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Глобальні дані</title>
    <link rel="stylesheet" href="src/views/styles/common.css">
    <link rel="stylesheet" href="src/views/styles/globalDataCarousel.css">
    <link rel="stylesheet" href="src/views/styles/form.css">
</head>

<body>
    <main class="container">
        <?php include __DIR__ . '/../components/globalData/carousel.php'; ?>

        <script src="src/views/helpers/updating/updateGlobalData.js"></script>
        <script src="src/views/helpers/carousel/globalDataArrowsHandler.js"></script>
        <script src="src/views/helpers/wplist/logins.js"></script>
    </main>
</body>