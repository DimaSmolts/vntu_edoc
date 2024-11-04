<?php
header('Content-Type: application/json');

try {
    $link = @mysqli_connect($servername, $username, $password, $dbname);
    if (!$link) {
        echo json_encode(['status' => 'error', 'message' => 'Connection error: ']);
    }

    $educationalProgram = $_POST['disciplineName'];

    $sql = "INSERT INTO workingPrograms (disciplineName) VALUES (?)";
    $stmt = $link->prepare($sql);

    echo json_encode(['status' => 'normal', 'message' => $stmt === false]);

    if ($stmt === false) {
        echo json_encode(['status' => 'error', 'message' => 'SQL prepare error: ' . $link->error]);
        exit();
    }

    $stmt->bind_param("s", $educationalProgram);
    if ($stmt->execute()) {
        $lastInsertId = $link->insert_id;
        $stmt->close();
        $link->close();

        header("Location: ../details.php?id=$lastInsertId");
        exit();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'SQL execution error: ' . $stmt->error]);
    }

    $stmt->close();
    $link->close();
} catch (Exception $error) {
    echo json_encode(['status' => 'error', 'message' => $error->getMessage()]);
}
