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
			$typeName = $data['typeName'];
			$tasksIds = getTaskId();

			if ($typeName === 'coursework') {
				$this->taskService->createCoursework($tasksIds->coursework, $semesterId, $tasksIds->courseProject);
			}

			if ($typeName === 'courseProject') {
				print_r('here');
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

			print_r($taskTypeId);

			$this->taskService->updateAssesmentComponents($semesterId, $taskTypeId, $assessmentComponents);
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

			$tasksIds = getTaskId();

			$this->taskService->deleteIndividualTask($semesterId, $tasksIds->{$typeName});
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
}
