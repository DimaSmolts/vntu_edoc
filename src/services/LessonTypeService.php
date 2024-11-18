<?php

namespace App\Services;

require_once __DIR__ . '/../config.php';

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

		return $result->fetch_all(MYSQLI_ASSOC);
	}
}
