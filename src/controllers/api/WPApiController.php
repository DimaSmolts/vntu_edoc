<?php

namespace App\Controllers;

require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/WorkingProgramGlobalDataOverwriteService.php';
require_once __DIR__ . '/../../services/WorkingProgramLiteratureService.php';
require_once __DIR__ . '/../../services/DepartmentService.php';
require_once __DIR__ . '/../../helpers/formatters/getFullFormattedWorkingProgramGlobalData.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedLessonsAndExamingsStructure.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedPointsDistributionRelatedData.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedDepartmentsData.php';
require_once __DIR__ . '/../../helpers/getPointsByTypeOfWork.php';
require_once __DIR__ . '/../../helpers/getSemestersWithModulesWithLessons.php';
require_once __DIR__ . '/../../helpers/getSemestersAndModulesIds.php';
require_once __DIR__ . '/../../helpers/getSemestersIdsByControlType.php';

use App\Services\WPService;
use App\Services\WorkingProgramGlobalDataOverwriteService;
use App\Services\WorkingProgramLiteratureService;
use App\Services\DepartmentService;

class WPApiController
{
	protected WPService $wpService;
	protected WorkingProgramGlobalDataOverwriteService $workingProgramGlobalDataOverwriteService;
	protected WorkingProgramLiteratureService $workingProgramLiteratureService;
	protected DepartmentService $departmentService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->workingProgramGlobalDataOverwriteService = new WorkingProgramGlobalDataOverwriteService();
		$this->workingProgramLiteratureService = new WorkingProgramLiteratureService();
		$this->departmentService = new DepartmentService();
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

		if ($field === 'facultyId') {
			$rawDepartments = $this->departmentService->getDepartments($value);
			$departments = getFormattedDepartmentsData($rawDepartments);

			ob_start();
			include __DIR__ . '/../../views/components/wpDetails/departmentDropdownLabel.php';
			$departmentDropdownLabel = ob_get_clean();

			echo json_encode((['departmentDropdownLabel' => $departmentDropdownLabel]));
		}
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

	public function getLessonsAndExamingsStructure()
	{
		header('Content-Type: application/json');

		$wpId = $_GET['id'];

		$rawStructure = $this->wpService->getLessonsAndExamingsStructure($wpId);

		$structure = getFormattedLessonsAndExamingsStructure($rawStructure);

		$rawGlobalWPData = $this->workingProgramGlobalDataOverwriteService->getGlobalDataByWPId($wpId);

		$globalWPData = getFullFormattedWorkingProgramGlobalData($rawGlobalWPData);

		$showReturnBtn = true;
		$isAbleToEditGlobalData = false;

		ob_start();
		include __DIR__ . '/../../views/components/wpDetails/practicalAssessmentCriteriaSlide.php';
		$practicalSlideContent = ob_get_clean();

		ob_start();
		include __DIR__ . '/../../views/components/wpDetails/labAssessmentCriteriaSlide.php';
		$labSlideContent = ob_get_clean();

		ob_start();
		include __DIR__ . '/../../views/components/wpDetails/seminarAssessmentCriteriaSlide.php';
		$seminarSlideContent = ob_get_clean();

		ob_start();
		include __DIR__ . '/../../views/components/wpDetails/courseworkAssessmentCriteriaSlide.php';
		$courseworkSlideContent = ob_get_clean();

		ob_start();
		include __DIR__ . '/../../views/components/wpDetails/colloquiumAssessmentCriteriaSlide.php';
		$colloquiumSlideContent = ob_get_clean();

		echo json_encode([
			'structure' => $structure,
			'practicalSlideContent' => $practicalSlideContent,
			'labSlideContent' => $labSlideContent,
			'seminarSlideContent' => $seminarSlideContent,
			'courseworkSlideContent' => $courseworkSlideContent,
			'colloquiumSlideContent' => $colloquiumSlideContent
		]);
	}

	public function getPointsDistributionSlideContent()
	{
		header('Content-Type: application/json');

		$wpId = $_GET['id'];

		$wpData = $this->wpService->getLessonsAndExamingsStructure($wpId);

		$pointsDistributionRelatedData = getFormattedPointsDistributionRelatedData($wpData);
		$structure = getFormattedLessonsAndExamingsStructure($wpData);
		$pointsByTypeOfWork = getPointsByTypeOfWork($pointsDistributionRelatedData, $structure);
		$semestersWithModulesWithLessons = getSemestersWithModulesWithLessons($pointsDistributionRelatedData);
		$semestersAndModulesIds = getSemestersAndModulesIds($pointsDistributionRelatedData);
		$semestersIdsByControlType = getSemestersIdsByControlType($pointsDistributionRelatedData);

		ob_start();
		include __DIR__ . '/../../views/components/wpDetails/pointsDistributionSlideContent.php';
		$pointsDistributionSlideContent = ob_get_clean();

		echo json_encode((['pointsDistributionSlideContent' => $pointsDistributionSlideContent, '$pointsByTypeOfWork' => $pointsByTypeOfWork, '$pointsDistributionRelatedData' => $pointsDistributionRelatedData]));
	}
}
