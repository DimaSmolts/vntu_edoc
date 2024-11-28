<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/WorkingProgramGlobalDataOverwriteService.php';
require_once __DIR__ . '/../../services/WorkingProgramLiteratureService.php';
require_once __DIR__ . '/../../helpers/formatters/getFullFormattedWorkingProgramGlobalData.php';

use App\Services\WPService;
use App\Services\WorkingProgramGlobalDataOverwriteService;
use App\Services\WorkingProgramLiteratureService;

class WPApiController
{
	protected WPService $wpService;
	protected WorkingProgramGlobalDataOverwriteService $workingProgramGlobalDataOverwriteService;
	protected WorkingProgramLiteratureService $workingProgramLiteratureService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->workingProgramGlobalDataOverwriteService = new WorkingProgramGlobalDataOverwriteService();
		$this->workingProgramLiteratureService = new WorkingProgramLiteratureService();
	}

	public function createNewWP()
	{
		header('Content-Type: application/json');

		$disciplineName = $_POST['disciplineName'] ?? null;

		$rawGlobalWPData = $this->workingProgramGlobalDataOverwriteService->getWorkingProgramGlobalData();

		$globalWPData = getFullFormattedWorkingProgramGlobalData($rawGlobalWPData);

		$newWPId = $this->wpService->createNewWP($disciplineName);
		$this->workingProgramGlobalDataOverwriteService->createNewWorkingProgramGlobalDataOverwrite($newWPId, $globalWPData);
		$this->workingProgramLiteratureService->createNewWPLiterature($newWPId);

		header("Location: wpdetails?id=" . $newWPId);

		exit();
	}

	public function updateWPDetails()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$id = intval($data['id']);
		$field = $data['field'];
		$value = $data['value'];

		$this->wpService->updateWPDetails($id, $field, $value);

		exit();
	}

	public function duplicateWP()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$wpId = intval($data['wpId']);

		$newWPData = $this->wpService->duplicateWP($wpId);

		echo json_encode($newWPData);
	}
}
