<?php

namespace App\Services;

require_once __DIR__ . '/../config.php';

class SemesterService
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

	public function getSemestersByWPId($id): array
	{
		$link = $this->getLink();

		$sql = "SELECT
					educationalDisciplineSemester.*,
					modules.id as moduleId,
					modules.educationalDisciplineSemesterId,
					modules.name as moduleName,
					modules.moduleNumber,
					themes.id as themeId,
					themes.name as themeName,
					themes.description as themeDescription,
					themes.themeNumber,
                    moduleAmount.moduleAmount
				FROM
					educationalDisciplineSemester
				LEFT JOIN
					modules ON educationalDisciplineSemester.id = modules.educationalDisciplineSemesterId
				LEFT JOIN
					themes ON modules.id = themes.moduleId
				LEFT JOIN
					(SELECT educationalDisciplineSemesterId, COUNT(*) as moduleAmount
					FROM modules
					GROUP BY educationalDisciplineSemesterId) as moduleAmount
					ON educationalDisciplineSemester.id = moduleAmount.educationalDisciplineSemesterId
				WHERE educationalDisciplineSemester.educationalDisciplineWPId = $id
				ORDER BY
					educationalDisciplineSemester.semesterNumber, modules.moduleNumber, themes.themeNumber;";

		$result = $link->query($sql);

		$itemsData = $result->fetch_all(MYSQLI_ASSOC);

		return $itemsData;
	}

	public function createNewSemester($wpId): int
	{
		$link = $this->getLink();

		$sql = "INSERT INTO `educationalDisciplineSemester`(`educationalDisciplineWPId`) VALUES ($wpId)";

		$link->query($sql);

		$lastInsertId = $link->insert_id;

		return $lastInsertId;
	}

	public function updateSemester($id, $field, $value) 
	{
		$link = $this->getLink();

		$sql = "UPDATE educationalDisciplineSemester SET $field = '$value' WHERE id = $id;";

		$link->query($sql);

		if ($link->affected_rows === 0) {
			echo json_encode(['status' => 'error', 'message' => 'Update failed or no changes made']);
		}
	}
}
