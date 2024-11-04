<?php
header('Content-Type: application/json');

try {
    $link = @mysqli_connect($servername, $username, $password, $dbname);

    if (!$link) {
        echo json_encode(['status' => 'error', 'message' => 'Connection error: ']);
    }
} catch (Exception $error) {
    echo json_encode(['status' => 'error', 'message' => $error->getMessage()]);
}

$id = $_GET['id'];

$sql = "SELECT `workingPrograms`.*, `fullTimeCharacteristic`.*, `correspondenceCharacteristic`.* FROM `workingPrograms`
	LEFT JOIN `educationalDisciplineCharacteristic` as `fullTimeCharacteristic` ON `workingPrograms`.`fullTimeCharacteristicId` = `fullTimeCharacteristic`.`id`
	LEFT JOIN `educationalDisciplineCharacteristic` as `correspondenceCharacteristic` ON `workingPrograms`.`correspondenceCharacteristicId` = `correspondenceCharacteristic`.`id`
	WHERE `workingPrograms`.`id` = $id";

$result = $link->query($sql);

if ($result->num_rows === 0) {
    echo json_encode(['status' => 'success', 'message' => 'Table is empty']);
} else {
    echo json_encode(['status' => 'success', 'message' => $result->fetch_all()]);
}
