<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/TaskService.php';
require_once __DIR__ . '/../../services/AssessmentCriteriaService.php';
require_once __DIR__ . '/../../helpers/getTaskId.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\TaskService;
use App\Services\AssessmentCriteriaService;

class TaskApiController extends BaseController
{
	protected WPService $wpService;
	protected TaskService $taskService;
	protected AssessmentCriteriaService $assessmentCriteriaService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->taskService = new TaskService();
		$this->assessmentCriteriaService = new AssessmentCriteriaService();
	}

	public function createIndividualTask()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$semesterId = intval($data['semesterId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($semesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$wpId = intval($data['wpId']);

			if (isset($data['typeId'])) {
				$typeId = $data['typeId'];

				$this->taskService->createAdditionalTask($typeId, $semesterId);

				$taskAssessmentCriteria = $this->assessmentCriteriaService->getAssessmentCriteriaForAdditionalTask();

				$this->assessmentCriteriaService->copyAssessmentCriteria($wpId, $taskAssessmentCriteria, $typeId);

				exit();
			}

			$typeName = $data['typeName'];
			$tasksIds = getTaskId();

			if ($typeName === 'coursework') {
				$this->taskService->createCoursework($tasksIds->coursework, $semesterId, $tasksIds->courseProject);

				$existingAssessmentCriteria = $this->assessmentCriteriaService->getAssessmentCriteriaByWPIdAndTaskType($wpId, $tasksIds->coursework);

				if (!$existingAssessmentCriteria) {
					$taskAssessmentCriteria = $this->assessmentCriteriaService->getAssessmentCriteriaByTaskType($tasksIds->coursework);
					$this->assessmentCriteriaService->copyAssessmentCriteria($wpId, $taskAssessmentCriteria);
				}
			}

			if ($typeName === 'courseProject') {
				$this->taskService->createCourseProject($tasksIds->courseProject, $semesterId, $tasksIds->coursework);

				$existingAssessmentCriteria = $this->assessmentCriteriaService->getAssessmentCriteriaByWPIdAndTaskType($wpId, $tasksIds->courseProject);

				if (!$existingAssessmentCriteria) {
					$taskAssessmentCriteria = $this->assessmentCriteriaService->getAssessmentCriteriaByTaskType($tasksIds->courseProject);
					$this->assessmentCriteriaService->copyAssessmentCriteria($wpId, $taskAssessmentCriteria);
				}
			}

			if ($typeName === 'calculationAndGraphicWork') {
				$this->taskService->createCalculationAndGraphicWork($tasksIds->calculationAndGraphicWork, $semesterId, $tasksIds->calculationAndGraphicTask);

				$existingAssessmentCriteria = $this->assessmentCriteriaService->getAssessmentCriteriaByWPIdAndTaskType($wpId, $tasksIds->calculationAndGraphicWork);

				if (!$existingAssessmentCriteria) {
					$taskAssessmentCriteria = $this->assessmentCriteriaService->getAssessmentCriteriaByTaskType($tasksIds->calculationAndGraphicWork);
					$this->assessmentCriteriaService->copyAssessmentCriteria($wpId, $taskAssessmentCriteria);
				}
			}

			if ($typeName === 'calculationAndGraphicTask') {
				$this->taskService->createCalculationAndGraphicTask($tasksIds->calculationAndGraphicTask, $semesterId, $tasksIds->calculationAndGraphicWork);

				$existingAssessmentCriteria = $this->assessmentCriteriaService->getAssessmentCriteriaByWPIdAndTaskType($wpId, $tasksIds->calculationAndGraphicTask);

				if (!$existingAssessmentCriteria) {
					$taskAssessmentCriteria = $this->assessmentCriteriaService->getAssessmentCriteriaByTaskType($tasksIds->calculationAndGraphicTask);
					$this->assessmentCriteriaService->copyAssessmentCriteria($wpId, $taskAssessmentCriteria);
				}
			}
		}
	}

	public function createNewAdditionalTasks()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$semesterId = intval($data['semesterId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($semesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$taskName = trim($data['taskName']);

			if (!empty($taskName)) {
				$taskTypeId = $this->taskService->createNewAdditionalTasks($taskName, $semesterId);

				echo json_encode(['status' => 'success', 'taskTypeId' => $taskTypeId]);
			}
		}
	}

	public function createModuleTask()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$moduleId = intval($data['moduleId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdByModuleId($moduleId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$wpId = intval($data['wpId']);

			$typeName = $data['typeName'];
			$tasksIds = getTaskId();

			$this->taskService->createModuleTask($tasksIds->{$typeName}, $moduleId);

			$taskAssessmentCriteria = $this->assessmentCriteriaService->getAssessmentCriteriaByTaskType($tasksIds->{$typeName});

			$this->assessmentCriteriaService->copyAssessmentCriteria($wpId, $taskAssessmentCriteria,);
		}
	}

	public function updateAssesmentComponents()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$semesterId = intval($data['semesterId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($semesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$taskTypeId = intval($data['taskTypeId']);
			$assessmentComponents = json_encode($data['assessmentComponents']);

			$this->taskService->updateAssesmentComponents($semesterId, $taskTypeId, $assessmentComponents);
		}
	}

	public function updateModuleTaskPoints()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$moduleId = intval($data['moduleId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdByModuleId($moduleId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$taskTypeId = intval($data['taskTypeId']);
			$points = intval($data['points']);

			$this->taskService->updateModuleTaskPoints($moduleId, $taskTypeId, $points);
		}
	}

	public function updateTaskPointsById()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$semesterId = intval($data['semesterId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($semesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$taskDetailsId = intval($data['taskDetailsId']);
			$points = intval($data['points']);

			$this->taskService->updateTaskPointsById($taskDetailsId, $points);
		}
	}

	public function deleteIndividualTask()
	{
		header('Content-Type: application/json');

		$semesterId = $_GET['semesterId'];

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($semesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$wpId = $_GET['wpId'];

			$typeName = isset($_GET['type']) ? $_GET['type'] : null;
			$typeId = isset($_GET['typeId']) ? $_GET['typeId'] : null;

			$tasksIds = getTaskId();

			$this->taskService->deleteIndividualTask($semesterId, $typeId ?? $tasksIds->{$typeName});

			$this->assessmentCriteriaService->deleteAssessmentCriteriaByTaskType($wpId, $typeId ?? $tasksIds->{$typeName});
		}
	}

	public function deleteModuleTask()
	{
		header('Content-Type: application/json');

		$moduleId = $_GET['moduleId'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByModuleId($moduleId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$wpId = $_GET['wpId'];

			$typeName = $_GET['type'];

			$tasksIds = getTaskId();

			$this->taskService->deleteModuleTask($moduleId, $tasksIds->{$typeName});

			$this->assessmentCriteriaService->deleteAssessmentCriteriaByTaskType($wpId, $typeId ?? $tasksIds->{$typeName});
		}
	}

	public function searchAdditionalTasks()
	{
		header('Content-Type: application/json');

		$isTeacher = $this->checkIfCurrentUserIsTeacher();

		if (!$isTeacher) {
			echo json_encode([]);
			exit();
		}

		$additionalTasks = $this->taskService->getAdditionalTasks();

		echo json_encode($additionalTasks);
	}

	public function updateTaskHours()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$semesterId = intval($data['semesterId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($semesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$hours = intval($data['hours']);
			$educationalFormId = intval($data['educationalFormId']);
			$taskDetailsId = intval($data['taskDetailsId']);

			$this->taskService->updateTaskHours($educationalFormId, $taskDetailsId, $hours);
		}
	}

	public function updateLessonSelfworkHours()
	{
		header('Content-Type: application/json');

		$input = file_get_contents('php://input');
		$data = json_decode($input, true);

		$semesterId = intval($data['semesterId']);

		$wpCreatorId = $this->wpService->getWPCreatorIdBySemesterId($semesterId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$hours = floatval($data['hours']);
			$educationalFormId = intval($data['educationalFormId']);
			$lessonTypeId = intval($data['lessonTypeId']);
			print_r($hours);

			$this->taskService->updateLessonSelfworkHours($educationalFormId, $lessonTypeId, $semesterId, $hours);
		}
	}
}
