<?php
header('Content-Type: application/json');

try {
    $link = @mysqli_connect($servername, $username, $password, $dbname);
    if (!$link) {
        echo json_encode(['status' => 'error', 'message' => 'Connection error: ']);
    }

    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    $id = intval($data['id']);
    $field = $data['field'];
    $value = $data['value'];

    $sql = "UPDATE educationalDisciplineCharacteristic SET $field = ? WHERE id = ?;";
    echo json_encode(['status' => 'success', 'message' => $id]);
    $stmt = $link->prepare($sql);

    echo json_encode(['status' => 'normal', 'message' => $stmt === false]);

    if ($stmt === false) {
        echo json_encode(['status' => 'error', 'message' => 'SQL prepare error: ' . $link->error]);
        exit();
    }

    $stmt->bind_param("si", $value, $id);
    if ($stmt->execute()) {
        $stmt->close();
        $link->close();
        echo json_encode(['status' => 'success', 'message' => 'SQL execution success: ']);
        exit();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'SQL execution error: ' . $stmt->error]);
    }

    $stmt->close();
    $link->close();
} catch (Exception $error) {
    echo json_encode(['status' => 'error', 'message' => $error->getMessage()]);
}
