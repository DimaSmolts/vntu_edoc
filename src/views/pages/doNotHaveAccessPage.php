<?php
$title = "Немає доступу";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Немає доступу</title>
    <link rel="stylesheet" href="src/views/styles/common.css">
    <link rel="stylesheet" href="src/views/styles/wpList.css">
</head>

<body>
    <main class="container">
        <?php include __DIR__ . '/../components/header.php'; ?>

        <?php if ($isLoggedIn): ?>
            <div class="no-access-text">
                <p>Студенти не мають доступу до даної сторінки</p>
            </div>
        <?php endif; ?>

        <?php include __DIR__ . '/../components/wpList/sessionBtns.php'; ?>
    </main>

    <script src="src/views/helpers/wplist/logins.js"></script>
</body>

</html>