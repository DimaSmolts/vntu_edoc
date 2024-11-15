<?php

namespace App\Services;

require_once __DIR__ . '/../config.php';

class EducationalFormLessonHoursService
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

	public function createNewEducationalFormLessonHours($lessonThemeId, $educationalFormId): int
	{
		$link = $this->getLink();

		$sql = "INSERT INTO `educationFormLessonHours`(`lessonThemeId`, `educationalFormId`)
					VALUES ($lessonThemeId, $educationalFormId)";

		$link->query($sql);

		$lastInsertId = $link->insert_id;

		return $lastInsertId;
	}

	public function updateEducationalFormLessonHours($lessonThemeId, $educationalFormId, $hours)
	{
		$link = $this->getLink();

		$sql = "UPDATE `educationFormLessonHours`
					SET `hours`= $hours
				WHERE `educationalFormId` = $educationalFormId AND `lessonThemeId`= $lessonThemeId";

		$link->query($sql);

		if ($link->affected_rows === 0) {
			echo json_encode(['status' => 'error', 'message' => 'Update failed or no changes made']);
		}
	}
}
