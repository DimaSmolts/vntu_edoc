<?php

namespace App\Services;

require_once __DIR__ . '/../models/ModuleModel.php';
require_once __DIR__ . '/../config.php';

use App\Models\ModuleModel;

class ModuleService
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

	public function getModulesBySemesterId($id): array
	{
		$link = $this->getLink();

		$sql = "SELECT * from `modules` WHERE `educationalDisciplineSemesterId` = $id";
		$result = $link->query($sql);

		$itemsData = $result->fetch_all(MYSQLI_ASSOC);

		$items = [];

		foreach ($itemsData as $itemData) {
			$items[] = new ModuleModel(
				$itemData['id'],
				$itemData['educationalDisciplineSemesterId'],
				$itemData['name'],
				$itemData['moduleNumber']
			);
		}

		return $items;
	}

	public function createNewModule($semesterId): int
	{
		$link = $this->getLink();

		$sql = "INSERT INTO `modules`(`educationalDisciplineSemesterId`) VALUES ($semesterId)";

		$link->query($sql);

		$lastInsertId = $link->insert_id;

		return $lastInsertId;
	}

	public function updateModule($id, $field, $value)
	{
		$link = $this->getLink();

		$sql = "UPDATE modules SET $field = '$value' WHERE id = $id;";

		$link->query($sql);

		if ($link->affected_rows === 0) {
			echo json_encode(['status' => 'error', 'message' => 'Update failed or no changes made']);
		}
	}
}
