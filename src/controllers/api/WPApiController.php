<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/GlobalWorkingProgramDataService.php';
require_once __DIR__ . '/../../services/GlobalDataForEducationalDisciplineService.php';
require_once __DIR__ . '/../../services/WorkingProgramLiteratureService.php';
require_once __DIR__ . '/../../helpers/formatters/getFullFormattedGlobalWorkingProgramData.php';

use App\Services\WPService;
use App\Services\GlobalWorkingProgramDataService;
use App\Services\GlobalDataForEducationalDisciplineService;
use App\Services\WorkingProgramLiteratureService;

class WPApiController
{
	protected WPService $wpService;
	protected GlobalWorkingProgramDataService $globalWorkingProgramDataService;
	protected GlobalDataForEducationalDisciplineService $globalDataForEducationalDisciplineService;
	protected WorkingProgramLiteratureService $workingProgramLiteratureService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->globalWorkingProgramDataService = new GlobalWorkingProgramDataService();
		$this->globalDataForEducationalDisciplineService = new GlobalDataForEducationalDisciplineService();
		$this->workingProgramLiteratureService = new WorkingProgramLiteratureService();
	}

	public function createNewWP()
	{
		header('Content-Type: application/json');

		$disciplineName = $_POST['disciplineName'] ?? null;

		$rawGlobalWPData = $this->globalWorkingProgramDataService->getGlobalWPData();

		$globalWPData = getFullFormattedGlobalWorkingProgramData($rawGlobalWPData);

		$newWPId = $this->wpService->createNewWP($disciplineName);
		$this->globalDataForEducationalDisciplineService->createNewDataForEducationalDiscipline($newWPId, $globalWPData);
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
