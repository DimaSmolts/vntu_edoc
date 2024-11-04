<?php
header('Content-Type: application/json');

try {
    $link = @mysqli_connect($servername, $username, $password, $dbname);
    if (!$link) {
        echo json_encode(['status' => 'error', 'message' => 'Connection error: ']);
    }

    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $id = intval($data['edId']);
    $eFName = $data['eFName'];

    $sql = "INSERT INTO educationalDisciplineCharacteristic (educationForm) VALUES (?)";
    $stmt = $link->prepare($sql);

    if ($stmt === false) {
        echo json_encode(['status' => 'error', 'message' => 'SQL prepare error: ' . $link->error]);
        exit();
    }

    $stmt->bind_param("s", $eFName);
    if ($stmt->execute()) {
        $lastInsertId = $link->insert_id;

        $stmt->close();
        $link->close();
        echo json_encode(['status' => 'success', 'message' => $lastInsertId]);
        exit();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'SQL execution error: ' . $stmt->error]);
    }

    $stmt->close();
    $link->close();
} catch (Exception $error) {
    echo json_encode(['status' => 'error', 'message' => $error->getMessage()]);
}
