<?php

require_once __DIR__ . '/../../models/SemesterEducationalFormModel.php';
require_once __DIR__ . '/../../models/ModuleTasksModel.php';
require_once __DIR__ . '/../../models/SemesterAndModulesTasksModel.php';
require_once __DIR__ . '/../getEducationalFormVisualName.php';
require_once __DIR__ . '/../getIsTypeOfWorkExists.php';
require_once __DIR__ . '/../getCourseTask.php';
require_once __DIR__ . '/../getTaskId.php';
require_once __DIR__ . '/../getAdditionalTasksTypeIds.php';

use App\Models\SemesterEducationalFormModel;
use App\Models\ModuleTasksModel;
use App\Models\SemesterAndModulesTasksModel;

function getFullFormattedSemestersAndModulesTasks($semesterCourseworkData)
{
	return $semesterCourseworkData->map(function ($semester) {
		$educationalForms = $semester->educationalForms->map(function ($educationalForm) {
			return new SemesterEducationalFormModel(
				$educationalForm->id,
				$educationalForm->educationalDisciplineSemesterId,
				$educationalForm->educationalFormId,
				$educationalForm->educationalForm->name,
				getEducationalFormVisualName($educationalForm->educationalForm->name)
			);
		})->toArray();

		$tasksIds = getTaskId();

		$isCourseworkExists = getIsTypeOfWorkExistsInSemester($semester, $tasksIds->coursework);
		$isCourseProjectExists = getIsTypeOfWorkExistsInSemester($semester, $tasksIds->courseProject);
		$isCalculationAndGraphicWorkExists = getIsTypeOfWorkExistsInSemester($semester, $tasksIds->calculationAndGraphicWork);
		$isCalculationAndGraphicTaskExists = getIsTypeOfWorkExistsInSemester($semester, $tasksIds->calculationAndGraphicTask);

		$modulesTasks = $semester->modules->map(function ($module) use (&$tasksIds) {
			$isColloquiumExists = getIsTypeOfWorkExistsInModule($module, $tasksIds->colloquium);
			$isControlWorkExists = getIsTypeOfWorkExistsInModule($module, $tasksIds->controlWork);

			return new ModuleTasksModel(
				$module->id,
				$isColloquiumExists,
				$isControlWorkExists,
				$module->moduleNumber
			);
		})->toArray();

		$additionalTaskIds = getAdditionalTasksTypeIds($semester);

		return new SemesterAndModulesTasksModel(
			$semester->id,
			$isCourseworkExists,
			$isCourseProjectExists,
			$isCalculationAndGraphicWorkExists,
			$isCalculationAndGraphicTaskExists,
			$additionalTaskIds,
			$semester->semesterNumber,
			$modulesTasks,
			$educationalForms
		);
	})->toArray();
}
