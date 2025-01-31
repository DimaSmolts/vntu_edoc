<?php
$title = "Робочі програми";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Робочі програми</title>
    <link rel="stylesheet" href="src/views/styles/common.css">
    <link rel="stylesheet" href="src/views/styles/wpList.css">
</head>

<body>
    <main class="container">
        <?php include __DIR__ . '/../components/header.php'; ?>

        <?php include __DIR__ . '/../components/wpList/greeting.php'; ?>

        <?php include __DIR__ . '/../components/wpList/list.php'; ?>

        <?php include __DIR__ . '/../components/wpList/createNewWPModal.php'; ?>

        <?php include __DIR__ . '/../components/wpDetails/deletingModal.php'; ?>
    </main>

    <script src="src/views/helpers/wplist/openCreateNewWPModal.js"></script>
    <script src="src/views/helpers/modal/openApproveDeletingModal.js"></script>
    <script src="src/views/helpers/view/createElement.js"></script>
    <script src="src/views/helpers/wplist/createNewListItem.js"></script>
    <script src="src/views/helpers/wplist/duplicateWP.js"></script>
    <script src="src/views/helpers/wplist/deleteWP.js"></script>
    <script src="src/views/helpers/wplist/logins.js"></script>
    <script src="src/views/helpers/validation/globalVariables.js"></script>
    <script src="src/views/helpers/requests/makePostRequestAndReturnData.js"></script>
    <script src="src/views/helpers/requests/makeDeleteRequest.js"></script>
</body>

</html>