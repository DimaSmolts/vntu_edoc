<?php

namespace App\Services;

require_once __DIR__ . '/../models/WPListItemModel.php';
require_once __DIR__ . '/../models/WPDetailsModel.php';
require_once __DIR__ . '/../config.php';

use App\Models\WPListItemModel;
use App\Models\WPDetailsModel;

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

		$itemsData = $result->fetch_all(MYSQLI_ASSOC);

		$items = [];

		foreach ($itemsData as $itemData) {
			$items[] = new WPListItemModel(
				$itemData['id'],
				$itemData['disciplineName'],
				$itemData['createdAt']
			);
		}

		return $items;
	}

	public function updateWPDetails()
	{
		$link = $this->getLink();

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$id = intval($data['id']);
		$field = $data['field'];
		$value = $data['value'];

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

	public function getWPDetails($id): WPDetailsModel
	{
		$link = $this->getLink();

		$sql = "SELECT * FROM educationalDisciplineWorkingProgram
				WHERE `educationalDisciplineWorkingProgram`.`id` = $id";
		$result = $link->query($sql);

		$arrayOfDetails = $result->fetch_all(MYSQLI_ASSOC);

		$details = $arrayOfDetails[0];

		return new WPDetailsModel(
			$details['id'],
			$details['regularYear'],
			$details['academicYear'],
			$details['facultyName'],
			$details['departmentName'],
			$details['disciplineName'],
			$details['degreeName'],
			$details['fielfOfStudyIdx'],
			$details['fielfOfStudyName'],
			$details['specialtyIdx'],
			$details['specialtyName'],
			$details['educationalProgram'],
			$details['notes'],
			$details['language'],
			$details['prerequisites'],
			$details['goal'],
			$details['tasks'],
			$details['competences'],
			$details['programResults'],
			$details['controlMeasures']
		);
	}
}
