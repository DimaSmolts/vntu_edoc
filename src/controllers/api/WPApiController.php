<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/AssessmentCriteriaService.php';
require_once __DIR__ . '/../../services/WorkingProgramLiteratureService.php';
require_once __DIR__ . '/../../services/DepartmentService.php';
require_once __DIR__ . '/../../services/EducationalFormService.php';
require_once __DIR__ . '/../../services/WorkingProgramGlobalDataService.php';
require_once __DIR__ . '/../../services/ThemeService.php';
require_once __DIR__ . '/../../helpers/formatters/getFullFormattedAssessmentCriterias.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedLessonsAndExamingsStructure.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedPointsDistributionRelatedData.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedDepartmentsData.php';
require_once __DIR__ . '/../../helpers/formatters/getFullFormattedWorkingProgramData.php';
require_once __DIR__ . '/../../helpers/formatters/getFormattedEducationalDisciplineStructure.php';
require_once __DIR__ . '/../../helpers/formatters/getFullFormattedSelfworkData.php';
require_once __DIR__ . '/../../helpers/formatters/getFullFormattedSemestersAndModulesTasks.php';
require_once __DIR__ . '/../../helpers/formatters/getFullFormattedCourseworksAndProjectsData.php';
require_once __DIR__ . '/../../helpers/getPointsByTypeOfWork.php';
require_once __DIR__ . '/../../helpers/getSemestersWithModulesWithLessons.php';
require_once __DIR__ . '/../../helpers/getSemestersAndModulesIds.php';
require_once __DIR__ . '/../../helpers/getSemestersIdsByControlType.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\AssessmentCriteriaService;
use App\Services\WorkingProgramLiteratureService;
use App\Services\DepartmentService;
use App\Services\EducationalFormService;
use App\Services\WorkingProgramGlobalDataService;
use App\Services\ThemeService;

class WPApiController extends BaseController
{
	protected WPService $wpService;
	protected AssessmentCriteriaService $assessmentCriteriaService;
	protected WorkingProgramLiteratureService $workingProgramLiteratureService;
	protected DepartmentService $departmentService;
	protected EducationalFormService $educationalFormService;
	protected WorkingProgramGlobalDataService $workingProgramGlobalDataService;
	protected ThemeService $themeService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->assessmentCriteriaService = new AssessmentCriteriaService();
		$this->workingProgramLiteratureService = new WorkingProgramLiteratureService();
		$this->departmentService = new DepartmentService();
		$this->educationalFormService = new EducationalFormService();
		$this->workingProgramGlobalDataService = new WorkingProgramGlobalDataService();
		$this->themeService = new ThemeService();
	}

	public function createNewWP()
	{
		header('Content-Type: application/json');

		$isLoggedIn = $this->checkIfUserLoggedIn();

		if (!$isLoggedIn) {
			$this->showDoNotHaveAccessPage($isLoggedIn);

			exit();
		}

		$isTeacher = $this->checkIfCurrentUserIsTeacher();

		if (!$isTeacher) {
			$this->showDoNotHaveAccessPage($isLoggedIn);

			exit();
		}

		$sessionInfo = $this->getSessionInfo();

		$disciplineName = $_POST['disciplineName'] ?? null;

		$newWPId = $this->wpService->createNewWP($disciplineName, $sessionInfo->id);

		$generalAssessmentCriteria = $this->assessmentCriteriaService->getGeneralAssessmentCriteria();
		$this->assessmentCriteriaService->copyAssessmentCriteria($newWPId, $generalAssessmentCriteria);

		$this->workingProgramLiteratureService->createNewWPLiterature($newWPId);

		header("Location: /workingPrograms/wpdetails?id=" . $newWPId);
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

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($id);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$this->wpService->updateWPDetails($id, $field, $value);
		}
	}

	public function duplicateWP()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$wpId = intval($data['wpId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$newWPData = $this->wpService->duplicateWP($wpId);

			echo json_encode($newWPData);
		}
	}

	public function getLessonsAndExamingsStructure()
	{
		header('Content-Type: application/json');

		$wpId = $_GET['id'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$wpData = $this->wpService->getLessonsAndExamingsStructure($wpId);

			$structure = getFormattedLessonsAndExamingsStructure($wpData);

			$assessmentCriterias = getFullFormattedAssessmentCriterias($wpData);

			$pointsDistributionRelatedData = getFormattedPointsDistributionRelatedData($wpData);

			$isLoggedIn = true;
			$showReturnBtn = true;
			$showEditGlobalDataBtn = false;

			$practicalSlideContent = null;
			$labSlideContent = null;
			$seminarSlideContent = null;
			$courseworkSlideContent = null;
			$courseProjectSlideContent = null;
			$calculationAndGraphicWorkSlideContent = null;
			$calculationAndGraphicTaskSlideContent = null;
			$additionalTasksSlidesContent = [];
			$colloquiumSlideContent = null;
			$controlWorkSlideContent = null;

			if ($structure->isPracticalsExist) {
				ob_start();
				include __DIR__ . '/../../views/components/wpDetails/practicalAssessmentCriteriaSlide.php';
				$practicalSlideContent = ob_get_clean();
			}

			if ($structure->isLabsExist) {
				ob_start();
				include __DIR__ . '/../../views/components/wpDetails/labAssessmentCriteriaSlide.php';
				$labSlideContent = ob_get_clean();
			}

			if ($structure->isSeminarsExist) {
				ob_start();
				include __DIR__ . '/../../views/components/wpDetails/seminarAssessmentCriteriaSlide.php';
				$seminarSlideContent = ob_get_clean();
			}

			if ($structure->isCourseworkExists) {
				ob_start();
				include __DIR__ . '/../../views/components/wpDetails/courseworkAssessmentCriteriaSlide.php';
				$courseworkSlideContent = ob_get_clean();
			}

			if ($structure->isCourseProjectExists) {
				ob_start();
				include __DIR__ . '/../../views/components/wpDetails/courseProjectAssessmentCriteriaSlide.php';
				$courseProjectSlideContent = ob_get_clean();
			}

			if ($structure->isCalculationAndGraphicWorkExists) {
				ob_start();
				include __DIR__ . '/../../views/components/wpDetails/calculationAndGraphicWorkAssessmentCriteriaSlide.php';
				$calculationAndGraphicWorkSlideContent = ob_get_clean();
			}

			if ($structure->isCalculationAndGraphicTaskExists) {
				ob_start();
				include __DIR__ . '/../../views/components/wpDetails/calculationAndGraphicTaskAssessmentCriteriaSlide.php';
				$calculationAndGraphicTaskSlideContent = ob_get_clean();
			}

			if ($structure->isAdditionalTasksExist) {
				foreach ($assessmentCriterias['additionalTasks'] as $additionalTask) {
					ob_start();
					include __DIR__ . '/../../views/components/wpDetails/additionalTaskAssessmentCriteriaSlide.php';
					$taskContent = ob_get_clean();
					$additionalTasksSlidesContent[$additionalTask->taskName] = $taskContent;
				}
			}

			if ($structure->isColloquiumExists) {
				ob_start();
				include __DIR__ . '/../../views/components/wpDetails/colloquiumAssessmentCriteriaSlide.php';
				$colloquiumSlideContent = ob_get_clean();
			}

			if ($structure->isControlWorkExists) {
				ob_start();
				include __DIR__ . '/../../views/components/wpDetails/controlWorkAssessmentCriteriaSlide.php';
				$controlWorkSlideContent = ob_get_clean();
			}

			echo json_encode([
				'structure' => $structure,
				'pointsDistributionRelatedData' => $pointsDistributionRelatedData,
				'practicalSlideContent' => $practicalSlideContent,
				'labSlideContent' => $labSlideContent,
				'seminarSlideContent' => $seminarSlideContent,
				'courseworkSlideContent' => $courseworkSlideContent,
				'courseProjectSlideContent' => $courseProjectSlideContent,
				'calculationAndGraphicWorkSlideContent' => $calculationAndGraphicWorkSlideContent,
				'calculationAndGraphicTaskSlideContent' => $calculationAndGraphicTaskSlideContent,
				'additionalTasksSlidesContent' => $additionalTasksSlidesContent,
				'colloquiumSlideContent' => $colloquiumSlideContent,
				'controlWorkSlideContent' => $controlWorkSlideContent,
			]);
		}
	}

	public function getPointsDistributionSlideContent()
	{
		header('Content-Type: application/json');

		$wpId = $_GET['id'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
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

			echo json_encode((['pointsDistributionSlideContent' => $pointsDistributionSlideContent]));
		}
	}

	public function getEducationalDisciplineSemesterControlMethodsContent()
	{
		header('Content-Type: application/json');

		$wpId = $_GET['id'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$wpData = $this->wpService->getSemestersAndModules($wpId);

			$rawEducationalForms = $this->educationalFormService->getEducationalForms();
			$educationalForms = getFormattedEducationalFormData($rawEducationalForms);

			$semesters = getFullFormattedSemestersAndModulesTasks($wpData->semesters);

			ob_start();
			include __DIR__ . '/../../views/components/wpDetails/educationalDisciplineSemesterControlMethodsSlideContent.php';
			$educationalDisciplineSemesterControlMethodsContent = ob_get_clean();

			echo json_encode((['educationalDisciplineSemesterControlMethodsContent' => $educationalDisciplineSemesterControlMethodsContent]));
		}
	}

	public function getSelfworkContent()
	{
		header('Content-Type: application/json');

		$wpId = $_GET['id'];
		$data = isset($_GET['data']) ? $_GET['data'] : null;

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$wpData = $this->wpService->getDataForSelfwork($wpId);
			$selfworkData = getFullFormattedSelfworkData($wpData);

			if ($data) {
				print_r($selfworkData);
			} else {
				ob_start();
				include __DIR__ . '/../../views/components/wpDetails/selfworkSlideContent.php';
				$selfworkContent = ob_get_clean();

				echo json_encode((['selfworkContent' => $selfworkContent]));
			}
		}
	}

	public function getEducationalDisciplineStructure()
	{
		header('Content-Type: application/json');

		$wpId = $_GET['id'];
		$data = isset($_GET['data']) ? $_GET['data'] : null;

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$wpId = $_GET['id'];
			$isSeminarVisible = $_GET['isSeminarVisible'] === "true" ? true : false;
			$isPracticalVisible = $_GET['isPracticalVisible'] === "true" ? true : false;
			$isLaboratoryVisible = $_GET['isLaboratoryVisible'] === "true" ? true : false;

			$rawEducationalDisciplineStructure = $this->wpService->getSemestersLessonsWithEducationalForms($wpId);
			$semesters = getFormattedEducationalDisciplineStructure($rawEducationalDisciplineStructure);
			$structure = getFormattedLessonsAndExamingsStructure($rawEducationalDisciplineStructure);
			$semestersIds = [];

			foreach ($semesters as $semester) {
				$semestersIds[] = $semester->id;
			}

			if ($data) {
				print_r($semesters);
			} else {
				ob_start();
				include __DIR__ . '/../../views/components/wpDetails/educationalDisciplineStructureSlideContent.php';
				$educationalDisciplineStructureContent = ob_get_clean();

				echo json_encode((['educationalDisciplineStructureContent' => $educationalDisciplineStructureContent]));
			}
		}
	}

	public function getDataForValidation()
	{
		header('Content-Type: application/json');

		$wpId = $_GET['id'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByWpId($wpId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$wpData = $this->wpService->getWPDetails($wpId);
			$rawGlobalWPData = $this->workingProgramGlobalDataService->getWorkingProgramGlobalData();

			$details = getFullFormattedWorkingProgramData($wpData, $rawGlobalWPData);

			$rawEducationalForms = $this->educationalFormService->getEducationalForms();
			$educationalForms = getFormattedEducationalFormData($rawEducationalForms);

			$selfworkData = getFullFormattedSelfworkData($wpData);

			$pointsDistributionRelatedData = getFormattedPointsDistributionRelatedData($wpData);
			$structure = getFormattedLessonsAndExamingsStructure($wpData);
			$pointsByTypeOfWork = getPointsByTypeOfWork($pointsDistributionRelatedData, $structure);

			$courseworksAndProjectsData = getFullFormattedCourseworksAndProjectsData($wpData->semesters);

			$semestersNumbersByIds = [];

			foreach ($wpData->semesters as $semester) {
				$semestersNumbersByIds[$semester->id] = $semester->semesterNumber ?? '';
			}

			echo json_encode(([
				'details' => $details,
				'selfworkData' => $selfworkData,
				'educationalForms' => $educationalForms,
				'pointsDistributionTotalBySemesters' => $pointsByTypeOfWork['totalBySemesters'],
				'semestersNumbersByIds' => $semestersNumbersByIds,
				'courseworksAndProjectsData' => $courseworksAndProjectsData
			]));
		}
	}
}
