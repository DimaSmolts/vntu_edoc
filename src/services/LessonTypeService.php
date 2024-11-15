<?php

namespace App\Services;

require_once __DIR__ . '/../models/LessonTypeModel.php';
require_once __DIR__ . '/../config.php';

use App\Models\LessonTypeModel;

class LessonTypeService
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

	public function getLessonTypes(): array
	{
		$link = $this->getLink();

		$sql = "SELECT * from `lessonTypes`";
		$result = $link->query($sql);

		$itemsData = $result->fetch_all(MYSQLI_ASSOC);

		$items = [];

		foreach ($itemsData as $itemData) {
			$items[] = new LessonTypeModel(
				$itemData['id'],
				$itemData['name']
			);
		}

		return $items;
	}
}
