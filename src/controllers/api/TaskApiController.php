<?php

namespace App\Controllers;

require_once __DIR__ . '/../BaseController.php';
require_once __DIR__ . '/../../services/WPService.php';
require_once __DIR__ . '/../../services/TaskService.php';
require_once __DIR__ . '/../../helpers/getTaskId.php';

use App\Controllers\BaseController;
use App\Services\WPService;
use App\Services\TaskService;

class TaskApiController extends BaseController
{
	protected WPService $wpService;
	protected TaskService $taskService;

	function __construct()
	{
		$this->wpService = new WPService();
		$this->taskService = new TaskService();
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
			if (isset($data['typeId'])) {
				$typeId = $data['typeId'];

				$this->taskService->createAdditionalTask($typeId, $semesterId);
				exit();
			}

			$typeName = $data['typeName'];
			$tasksIds = getTaskId();

			if ($typeName === 'coursework') {
				$this->taskService->createCoursework($tasksIds->coursework, $semesterId, $tasksIds->courseProject);
			}

			if ($typeName === 'courseProject') {
				$this->taskService->createCourseProject($tasksIds->courseProject, $semesterId, $tasksIds->coursework);
			}

			if ($typeName === 'calculationAndGraphicWork') {
				$this->taskService->createCalculationAndGraphicWork($tasksIds->calculationAndGraphicWork, $semesterId, $tasksIds->calculationAndGraphicTask);
			}

			if ($typeName === 'calculationAndGraphicTask') {
				$this->taskService->createCalculationAndGraphicTask($tasksIds->calculationAndGraphicTask, $semesterId, $tasksIds->calculationAndGraphicWork);
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
			$typeName = $data['typeName'];
			$tasksIds = getTaskId();

			$this->taskService->createModuleTask($tasksIds->{$typeName}, $moduleId);
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
			$typeName = $_GET['type'];
			$typeId = isset($_GET['typeId']) ? $_GET['typeId'] : null;

			$tasksIds = getTaskId();

			$this->taskService->deleteIndividualTask($semesterId, $typeId ?? $tasksIds->{$typeName});
		}
	}

	public function deleteModuleTask()
	{
		header('Content-Type: application/json');

		$moduleId = $_GET['moduleId'];

		$wpCreatorId = $this->wpService->getWPCreatorIdByModuleId($moduleId);
		$ifCurrentUserHasAccessToWP = $this->checkIfCurrentUserHasAccessToWP($wpCreatorId);

		if ($ifCurrentUserHasAccessToWP) {
			$typeName = $_GET['type'];

			$tasksIds = getTaskId();

			$this->taskService->deleteModuleTask($moduleId, $tasksIds->{$typeName});
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
