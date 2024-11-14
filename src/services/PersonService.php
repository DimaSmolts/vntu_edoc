<?php

namespace App\Services;

require_once __DIR__ . '/../models/PersonModel.php';
require_once __DIR__ . '/../models/WPInvolvedPersonModel.php';
require_once __DIR__ . '/../config.php';

use App\Models\PersonModel;
use App\Models\WPInvolvedPersonModel;

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

		$itemsData = $result->fetch_all(MYSQLI_ASSOC);

		$items = [];

		foreach ($itemsData as $itemData) {
			$items[] = new PersonModel(
				$itemData['id'],
				$itemData['surname'],
				$itemData['name'],
				$itemData['patronymicName'],
				$itemData['degree']
			);
		}

		return $items;
	}

	public function getWorkingProgramInvolvedPersons(): array
	{
		$link = $this->getLink();

		$wpId = $_GET['id'];

		$sql = "SELECT `workingProgramInvolvedPersons`.`id` as `workingProgramInvolvedPersonsId`, `persons`.`id` as `personId`, `involvedPersonsRoles`.`role` FROM `workingProgramInvolvedPersons`
				INNER JOIN `persons` ON `workingProgramInvolvedPersons`.`personId` = `persons`.`id`
				INNER JOIN `involvedPersonsRoles` ON `workingProgramInvolvedPersons`.`involvedPersonRoleId` = `involvedPersonsRoles`.`id`
				WHERE `workingProgramInvolvedPersons`.`educationalDisciplineWPId` = $wpId";
		$result = $link->query($sql);

		$itemsData = $result->fetch_all(MYSQLI_ASSOC);

		$items = [];

		foreach ($itemsData as $itemData) {
			$items[] = new WPInvolvedPersonModel(
				$itemData['workingProgramInvolvedPersonsId'],
				$itemData['personId'],
				$itemData['role']
			);
		}

		return $items;
	}

	public function updateWorkingProgramInvolvedPerson()
	{
		$link = $this->getLink();

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$wpInvolvedPersonId = intval($data['wpInvolvedPersonId']) ?? NULL;
		$wpId = intval($data['wpId']);
		$personId = intval($data['personId']);
		$involvedPersonRoleId = intval($data['roleId']);

		echo $wpInvolvedPersonId;
		echo $wpId;
		echo $personId;
		echo $involvedPersonRoleId;

		$sql = "INSERT INTO `workingProgramInvolvedPersons` (id, educationalDisciplineWPId, personId, involvedPersonRoleId)
				VALUES ($wpInvolvedPersonId, $wpId, $personId, $involvedPersonRoleId)
				ON DUPLICATE KEY UPDATE 
					educationalDisciplineWPId = VALUES(educationalDisciplineWPId),
					personId = VALUES(personId),
					involvedPersonRoleId = VALUES(involvedPersonRoleId)";

		$link->query($sql);
	}
}
