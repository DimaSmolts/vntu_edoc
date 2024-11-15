<?php

namespace App\Services;

require_once __DIR__ . '/../config.php';

class LessonThemeService
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

	public function createNewLessonTheme($themeId, $lessonTypeId): int
	{
		$link = $this->getLink();

		$sql = "INSERT INTO `lessonThemes`(`themeId`, `lessonTypeId`) VALUES ($themeId, $lessonTypeId)";

		$link->query($sql);

		$lastInsertId = $link->insert_id;

		return $lastInsertId;
	}

	public function updateLessonTheme($id, $field, $value)
	{
		$link = $this->getLink();

		$sql = "UPDATE `lessonThemes` SET $field = '$value' WHERE id = $id;";

		$link->query($sql);

		if ($link->affected_rows === 0) {
			echo json_encode(['status' => 'error', 'message' => 'Update failed or no changes made']);
		}
	}
}
