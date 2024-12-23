<?php

namespace App\Controllers;

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../services/WPService.php';
require_once __DIR__ . '/../services/EducationalFormService.php';
require_once __DIR__ . '/../services/FacultyService.php';
require_once __DIR__ . '/../services/DepartmentService.php';
require_once __DIR__ . '/../helpers/formatters/getFullFormattedWorkingProgramData.php';
require_once __DIR__ . '/../helpers/formatters/getFormattedWPListData.php';
require_once __DIR__ . '/../helpers/formatters/getFormattedEducationalFormData.php';
require_once __DIR__ . '/../helpers/formatters/getFormattedFacultiesData.php';
require_once __DIR__ . '/../helpers/formatters/getFormattedDepartmentsData.php';
require_once __DIR__ . '/../helpers/formatters/getFormattedCreator.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\EducationalFormService;
use App\Services\FacultyService;
use App\Services\DepartmentService;

class WPController extends BaseController
{
	protected WPService $wpService;
	protected EducationalFormService $educationalFormService;
	protected FacultyService $facultyService;
	protected DepartmentService $departmentService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->educationalFormService = new EducationalFormService();
		$this->facultyService = new FacultyService();
		$this->departmentService = new DepartmentService();
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
				$details = getFullFormattedWorkingProgramData($rawDetails);

				$rawEducationalForms = $this->educationalFormService->getEducationalForms();
				$educationalForms = getFormattedEducationalFormData($rawEducationalForms);

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
