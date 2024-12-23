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

        <div class="no-access-text">
            <p>Лише адміністратор має доступ до редагування глобальних даних.</p>
        </div>
    </main>

    <script src="src/views/helpers/wplist/logins.js"></script>
</body>

</html>