<?php

namespace App\Services;

require_once __DIR__ . '/../models/ThemeModel.php';
require_once __DIR__ . '/../config.php';

class ThemeService
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

	public function getThemesByWPId($wpId): array
	{
		$link = $this->getLink();

		$sql = "SELECT
					`themes`.*
				FROM
					educationalDisciplineSemester
				LEFT JOIN
					modules ON educationalDisciplineSemester.id = modules.educationalDisciplineSemesterId
				LEFT JOIN
					themes ON modules.id = themes.moduleId
				WHERE educationalDisciplineSemester.educationalDisciplineWPId = $wpId
				ORDER BY
					themes.themeNumber;";

		$result = $link->query($sql);

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function createNewTheme($moduleId): int
	{
		$link = $this->getLink();

		$sql = "INSERT INTO `themes`(`moduleId`) VALUES ($moduleId)";

		$link->query($sql);

		$lastInsertId = $link->insert_id;

		return $lastInsertId;
	}

	public function updateTheme($id, $field, $value)
	{
		$link = $this->getLink();

		$sql = "UPDATE themes SET $field = '$value' WHERE id = $id;";

		$link->query($sql);

		if ($link->affected_rows === 0) {
			echo json_encode(['status' => 'error', 'message' => 'Update failed or no changes made']);
		}
	}
}
