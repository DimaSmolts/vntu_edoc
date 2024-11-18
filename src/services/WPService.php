<?php

namespace App\Services;

require_once __DIR__ . '/../config.php';

class WPService
{
	private function getLink()
	{
		$config = getDatabaseConfig();
		try {
			$link = @mysqli_connect($config->servername, $config->username, $config->password, $config->dbname);
			if (!$link) {
				echo json_encode(['status' => 'error2', 'message' => 'Connection error: ']);
			}
		} catch (\Exception $error) {
			echo json_encode(['status' => 'error3', 'message' => $error->getMessage()]);
		}

		return $link;
	}

	public function getWPList(): array
	{
		$link = $this->getLink();

		$sql = "SELECT id, disciplineName, createdAt FROM educationalDisciplineWorkingProgram";
		$result = $link->query($sql);

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function updateWPDetails($id, $field, $value)
	{
		$link = $this->getLink();

		$sql = "UPDATE educationalDisciplineWorkingProgram SET $field = '$value' WHERE id = $id;";

		$link->query($sql);

		if ($link->affected_rows === 0) {
			echo json_encode(['status' => 'error', 'message' => 'Update failed or no changes made']);
		}
	}

	public function createNewWP()
	{
		$link = $this->getLink();

		$disciplineName = $_POST['disciplineName'] ?? null;

		$sql = "INSERT INTO educationalDisciplineWorkingProgram (disciplineName) VALUES ('$disciplineName');";

		$link->query($sql);

		$lastInsertId = $link->insert_id;

		return $lastInsertId;
	}

	public function getWPDetails($id)
	{
		$link = $this->getLink();

		$sql = "SELECT * FROM educationalDisciplineWorkingProgram
				WHERE `educationalDisciplineWorkingProgram`.`id` = $id";
		$result = $link->query($sql);

		$arrayOfDetails = $result->fetch_all(MYSQLI_ASSOC);

		return $arrayOfDetails[0];
	}
}
