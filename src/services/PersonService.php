<?php

namespace App\Services;

require_once __DIR__ . '/../config.php';

class PersonService
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

	public function getPersons(): array
	{
		$link = $this->getLink();

		$sql = "SELECT * FROM persons";
		$result = $link->query($sql);

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getWorkingProgramInvolvedPersons($wpId): array
	{
		$link = $this->getLink();

		$sql = "SELECT `workingProgramInvolvedPersons`.`id` as `workingProgramInvolvedPersonsId`, `persons`.`id` as `personId`, `involvedPersonsRoles`.`role` FROM `workingProgramInvolvedPersons`
				INNER JOIN `persons` ON `workingProgramInvolvedPersons`.`personId` = `persons`.`id`
				INNER JOIN `involvedPersonsRoles` ON `workingProgramInvolvedPersons`.`involvedPersonRoleId` = `involvedPersonsRoles`.`id`
				WHERE `workingProgramInvolvedPersons`.`educationalDisciplineWPId` = $wpId";
		$result = $link->query($sql);

		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function updateWorkingProgramInvolvedPerson($wpInvolvedPersonId, $wpId, $personId, $involvedPersonRoleId)
	{
		$link = $this->getLink();

		$sql = "INSERT INTO `workingProgramInvolvedPersons` (id, educationalDisciplineWPId, personId, involvedPersonRoleId)
				VALUES ($wpInvolvedPersonId, $wpId, $personId, $involvedPersonRoleId)
				ON DUPLICATE KEY UPDATE 
					educationalDisciplineWPId = VALUES(educationalDisciplineWPId),
					personId = VALUES(personId),
					involvedPersonRoleId = VALUES(involvedPersonRoleId)";

		$link->query($sql);
	}
}
