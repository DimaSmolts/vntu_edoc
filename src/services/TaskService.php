<?php

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;

class TaskService
{
	public function createAdditionalTask($typeId, $semesterId)
	{
		// Перевіряємо чи такого завдання, щоб не створити дублікат
		$task = Capsule::table('taskDetails')
			->where('taskTypeId', $typeId)
			->where('semesterId', $semesterId)
			->first();

		if ($task) {
			echo json_encode(['status' => 'error', 'message' => 'This task exists']);
			return;
		}

		// Створюємо завдання
		$taskId = Capsule::table('taskDetails')->insertGetId([
			'taskTypeId' => $typeId,
			'semesterId' => $semesterId
		]);

		return $taskId;
	}

	public function createNewAdditionalTasks($typeName, $semesterId)
	{
		// Створюємо тип для цього завдання
		$taskTypeId = Capsule::table('taskTypes')->insertGetId([
			'name' => $typeName
		]);

		// Створюємо завдання
		Capsule::table('taskDetails')->insertGetId([
			'taskTypeId' => $taskTypeId,
			'semesterId' => $semesterId
		]);

		return $taskTypeId;
	}

	public function createCoursework($courseworkTypeId, $semesterId, $courseProjectTypeId)
	{
		// Перевіряємо чи такої курсової немає, щоб не створити дублікат
		$coursework = Capsule::table('taskDetails')
			->where('taskTypeId', $courseworkTypeId)
			->where('semesterId', $semesterId)
			->first();

		if ($coursework) {
			echo json_encode(['status' => 'error', 'message' => 'This coursework exists']);
			return;
		}

		// Перевіряємо чи є курсовий проєкт
		$courseProject = Capsule::table('taskDetails')
			->where('taskTypeId', $courseProjectTypeId)
			->where('semesterId', $semesterId)
			->first();
		// Видаляємо якщо є
		if ($courseProject) {
			Capsule::table('taskDetails')->where('id', $courseProject->id)->delete();
		}

		// Створюємо курсову роботу
		$courseworkId = Capsule::table('taskDetails')->insertGetId([
			'taskTypeId' => $courseworkTypeId,
			'semesterId' => $semesterId
		]);

		// Отримуємо всі форми здобуття освіти для даного семестру
		$educationForms = Capsule::table('educationalDisciplineSemesterEducationForm')
			->where('educationalDisciplineSemesterId', $semesterId)
			->get();

		if (!empty($educationForms)) {
			foreach ($educationForms as $educationForm) {
				Capsule::table('educationalFormTaskHours')->insertGetId([
					'educationalFormId' => $educationForm->id,
					'taskDetailsId' => $courseworkId,
					'hours' => 45
				]);
			}
		} else {
			Capsule::table('educationalFormTaskHours')->insertGetId([
				'educationalFormId' => 1,
				'taskDetailsId' => $courseworkId,
				'hours' => 45
			]);
		}

		return $courseworkId;
	}

	public function createCourseProject($courseProjectTypeId, $semesterId, $courseworkTypeId)
	{
		// Перевіряємо чи такого курсового немає, щоб не створити дублікат
		$courseProject = Capsule::table('taskDetails')
			->where('taskTypeId', $courseProjectTypeId)
			->where('semesterId', $semesterId)
			->first();

		if ($courseProject) {
			echo json_encode(['status' => 'error', 'message' => 'This course project exists']);
			return;
		}

		// Перевіряємо чи є курсова робота
		$coursework = Capsule::table('taskDetails')
			->where('taskTypeId', $courseworkTypeId)
			->where('semesterId', $semesterId)
			->first();

		// Видаляємо якщо є
		if ($coursework) {
			Capsule::table('taskDetails')->where('id', $coursework->id)->delete();
		}

		// Створюємо курсову роботу
		$courseProjectId = Capsule::table('taskDetails')->insertGetId([
			'taskTypeId' => $courseProjectTypeId,
			'semesterId' => $semesterId
		]);

		// Отримуємо всі форми здобуття освіти для даного семестру
		$educationForms = Capsule::table('educationalDisciplineSemesterEducationForm')
			->where('educationalDisciplineSemesterId', $semesterId)
			->get();

		if (!empty($educationForms)) {
			foreach ($educationForms as $educationForm) {
				Capsule::table('educationalFormTaskHours')->insertGetId([
					'educationalFormId' => $educationForm->id,
					'taskDetailsId' => $courseProjectId,
					'hours' => 60
				]);
			}
		} else {
			Capsule::table('educationalFormTaskHours')->insertGetId([
				'educationalFormId' => 1,
				'taskDetailsId' => $courseProjectId,
				'hours' => 60
			]);
		}

		return $courseProjectId;
	}

	public function createCalculationAndGraphicWork($calculationAndGraphicWorkTypeId, $semesterId, $calculationAndGraphicTaskTypeId)
	{
		// Перевіряємо чи такого курсового немає, щоб не створити дублікат
		$calculationAndGraphicWork = Capsule::table('taskDetails')
			->where('taskTypeId', $calculationAndGraphicWorkTypeId)
			->where('semesterId', $semesterId)
			->first();

		if ($calculationAndGraphicWork) {
			echo json_encode(['status' => 'error', 'message' => 'This calculation and graphic work exists']);
			return;
		}

		// Перевіряємо чи є курсова робота
		$calculationAndGraphicTask = Capsule::table('taskDetails')
			->where('taskTypeId', $calculationAndGraphicTaskTypeId)
			->where('semesterId', $semesterId)
			->first();
		// Видаляємо якщо є 
		if ($calculationAndGraphicTask) {
			Capsule::table('taskDetails')->where('id', $calculationAndGraphicTask->id)->delete();
		}

		// Створюємо курсову роботу
		$calculationAndGraphicWorkId = Capsule::table('taskDetails')->insertGetId([
			'taskTypeId' => $calculationAndGraphicWorkTypeId,
			'semesterId' => $semesterId
		]);

		return $calculationAndGraphicWorkId;
	}

	public function createCalculationAndGraphicTask($calculationAndGraphicTaskTypeId, $semesterId, $calculationAndGraphicWorkTypeId)
	{
		// Перевіряємо чи такого курсового немає, щоб не створити дублікат
		$calculationAndGraphicTask = Capsule::table('taskDetails')
			->where('taskTypeId', $calculationAndGraphicTaskTypeId)
			->where('semesterId', $semesterId)
			->first();

		if ($calculationAndGraphicTask) {
			echo json_encode(['status' => 'error', 'message' => 'This calculation and graphic task exists']);
			return;
		}

		// Перевіряємо чи є курсова робота
		$calculationAndGraphicWork = Capsule::table('taskDetails')
			->where('taskTypeId', $calculationAndGraphicWorkTypeId)
			->where('semesterId', $semesterId)
			->first();
		// Видаляємо якщо є
		if ($calculationAndGraphicWork) {
			Capsule::table('taskDetails')->where('id', $calculationAndGraphicWork->id)->delete();
		}

		// Створюємо курсову роботу
		$calculationAndGraphicTaskId = Capsule::table('taskDetails')->insertGetId([
			'taskTypeId' => $calculationAndGraphicTaskTypeId,
			'semesterId' => $semesterId
		]);

		return $calculationAndGraphicTaskId;
	}

	public function createModuleTask($taskTypeId, $moduleId)
	{
		// Перевіряємо чи такого завдання немає, щоб не створити дублікат
		$task = Capsule::table('taskDetails')
			->where('taskTypeId', $taskTypeId)
			->where('moduleId', $moduleId)
			->first();

		if ($task) {
			echo json_encode(['status' => 'error', 'message' => 'This module task exists']);
			return;
		}

		// Створюємо завдання
		$newTaskId = Capsule::table('taskDetails')->insertGetId([
			'taskTypeId' => $taskTypeId,
			'moduleId' => $moduleId
		]);

		return $newTaskId;
	}

	public function updateAssesmentComponents($semesterId, $taskTypeId, $assessmentComponents)
	{
		$task = Capsule::table('taskDetails')
			->where('semesterId', $semesterId)
			->where('taskTypeId', $taskTypeId)
			->first();

		if (!$task) {
			echo json_encode(['status' => 'error', 'message' => 'Task not found']);
			return;
		}

		$updated = Capsule::table('taskDetails')
			->where('semesterId', $semesterId)
			->where('taskTypeId', $taskTypeId)
			->update(['assessmentComponents' => $assessmentComponents]);

		if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'Assesment components updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No changes were made']);
		}
	}

	public function deleteIndividualTask($semesterId, $taskTypeId)
	{
		// Use Capsule to delete the theme by ID
		$deleted = Capsule::table('taskDetails')
			->where('semesterId', $semesterId)
			->where('taskTypeId', $taskTypeId)
			->delete();

		// Check if any row was deleted
		if ($deleted) {
			echo json_encode(['status' => 'success', 'message' => 'Individual task deleted successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Individual task not found or delete failed']);
		}
	}

	public function deleteModuleTask($moduleId, $taskTypeId)
	{
		// Use Capsule to delete the theme by ID
		$deleted = Capsule::table('taskDetails')
			->where('moduleId', $moduleId)
			->where('taskTypeId', $taskTypeId)
			->delete();

		// Check if any row was deleted
		if ($deleted) {
			echo json_encode(['status' => 'success', 'message' => 'Module task deleted successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Module task not found or delete failed']);
		}
	}

	public function getAdditionalTasks()
	{
		$additionalTasks = Capsule::table('taskTypes')
			->where('id', '>', 6)
			->get();

		return $additionalTasks;
	}
}
