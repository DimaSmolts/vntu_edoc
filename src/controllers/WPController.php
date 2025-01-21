<?php

namespace App\Controllers;

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../services/WPService.php';
require_once __DIR__ . '/../services/EducationalFormService.php';
require_once __DIR__ . '/../services/FacultyService.php';
require_once __DIR__ . '/../services/DepartmentService.php';
require_once __DIR__ . '/../services/WorkingProgramGlobalDataService.php';
require_once __DIR__ . '/../helpers/formatters/getFullFormattedWorkingProgramData.php';
require_once __DIR__ . '/../helpers/formatters/getFormattedWPListData.php';
require_once __DIR__ . '/../helpers/formatters/getFormattedEducationalFormData.php';
require_once __DIR__ . '/../helpers/formatters/getFormattedFacultiesData.php';
require_once __DIR__ . '/../helpers/formatters/getFormattedDepartmentsData.php';
require_once __DIR__ . '/../helpers/formatters/getFormattedCreator.php';
require_once __DIR__ . '/../helpers/formatters/getFullFormattedSelfworkData.php';
require_once __DIR__ . '/../helpers/formatters/getFullFormattedCourseworksAndProjectsData.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\EducationalFormService;
use App\Services\FacultyService;
use App\Services\DepartmentService;
use App\Services\WorkingProgramGlobalDataService;

class WPController extends BaseController
{
	protected WPService $wpService;
	protected EducationalFormService $educationalFormService;
	protected FacultyService $facultyService;
	protected DepartmentService $departmentService;
	protected WorkingProgramGlobalDataService $workingProgramGlobalDataService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->educationalFormService = new EducationalFormService();
		$this->facultyService = new FacultyService();
		$this->departmentService = new DepartmentService();
		$this->workingProgramGlobalDataService = new WorkingProgramGlobalDataService();
	}

	public function getWPListItems()
	{
		header('Content-Type: text/html');

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

		$rawData = $this->wpService->getWPList($sessionInfo->id);

		$items = getFormattedWPListData($rawData->items);

		$creator = getFormattedCreator($rawData->creator);

		$isLoggedIn = true;
		$showReturnBtn = false;
		$showEditGlobalDataBtn = $sessionInfo->id === '2';

		require __DIR__ . '/../views/pages/wpListPage.php';
	}

	public function getWPDetails()
	{
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

		$wpId = $_GET['id'];
		$isData = isset($_GET['data']) ? $_GET['data'] : false;

		$rawDetails = $this->wpService->getWPDetails($wpId);

		if (!$rawDetails) {
			$this->showWPDetailsNotExistsPage();

			exit();
		}

		if ($isData) {
			header('Content-Type: text/json; charset=UTF-8');
			print_r($rawDetails);
		} else {
			header('Content-Type: text/html; charset=UTF-8');

			$ifCurrentUserHasAccessToWP  = $this->checkIfCurrentUserHasAccessToWP($rawDetails->creator->id);

			if ($ifCurrentUserHasAccessToWP) {
				$rawGlobalWPData = $this->workingProgramGlobalDataService->getWorkingProgramGlobalData();

				$details = getFullFormattedWorkingProgramData($rawDetails, $rawGlobalWPData);

				$rawEducationalForms = $this->educationalFormService->getEducationalForms();
				$educationalForms = getFormattedEducationalFormData($rawEducationalForms);

				$selfworkData = getFullFormattedSelfworkData($rawDetails);

				$pointsDistributionRelatedData = getFormattedPointsDistributionRelatedData($rawDetails);
				$structure = getFormattedLessonsAndExamingsStructure($rawDetails);
				$pointsByTypeOfWork = getPointsByTypeOfWork($pointsDistributionRelatedData, $structure);
				$pointsDistributionTotalBySemesters = $pointsByTypeOfWork['totalBySemesters'];

				$courseworksAndProjectsData = getFullFormattedCourseworksAndProjectsData($rawDetails->semesters);

				$semestersIds = [];
				$semestersNumbersByIds = [];

				foreach ($rawDetails->semesters as $semester) {
					$semestersIds[] = $semester->id;
					$semestersNumbersByIds[$semester->id] = $semester->semesterNumber ?? '';
				}

				$isLoggedIn = true;
				$showReturnBtn = true;
				$showEditGlobalDataBtn = false;

				require __DIR__ . '/../views/pages/wpDetailsPage.php';
				exit();
			} else {
				$this->showDoNotHaveAccessDetailsPage();

				exit();
			}
		}
	}
}
