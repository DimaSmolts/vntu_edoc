<?php

namespace App\Models;

require_once __DIR__ . '/TaskModel.php';

use App\Models\TaskModel;

class SelfworkModel
{
	public int $semesterId;
	public array $totalHoursForLections;
	public int $practicalsAmount;
	public int $seminarsAmount;
	public int $labsAmount;
	public array $educationalForms;
	public bool $isCourseworkExists;
	public bool $isCourseProjectExists;
	public bool $isCalculationAndGraphicWorkExists;
	public bool $isCalculationAndGraphiTaskExists;
	public array $additionalTasks;
	public int $colloquiumAmount;
	public int $controlWorkAmount;
	public ?int $semesterNumber;
	public ?int $examTypeId;
	public ?string $examTypeName;
	public ?int $creditsAmount;
	public ?TaskModel $courseTask;
	public ?TaskModel $calculationAndGraphicTypeTask;
	public ?TaskModel $moduleTask;
	public ?TaskModel $lectionSelfworkTask;
	public ?TaskModel $labSelfworkTask;
	public ?TaskModel $practicalSelfworkTask;
	public ?TaskModel $seminarSelfworkTask;

	public function __construct(
		int $semesterId,
		array $totalHoursForLections,
		int $practicalsAmount,
		int $seminarsAmount,
		int $labsAmount,
		array $educationalForms,
		bool $isCourseworkExists,
		bool $isCourseProjectExists,
		bool $isCalculationAndGraphicWorkExists,
		bool $isCalculationAndGraphiTaskExists,
		array $additionalTasks,
		int $colloquiumAmount,
		int $controlWorkAmount,
		?int $semesterNumber = null,
		?int $examTypeId = null,
		?string $examTypeName = '',
		?int $creditsAmount = null,
		?TaskModel $courseTask = null,
		?TaskModel $calculationAndGraphicTypeTask = null,
		?TaskModel $moduleTask = null,
		?TaskModel $lectionSelfworkTask = null,
		?TaskModel $labSelfworkTask = null,
		?TaskModel $practicalSelfworkTask = null,
		?TaskModel $seminarSelfworkTask = null,
	) {
		$this->semesterId = $semesterId;
		$this->totalHoursForLections = $totalHoursForLections;
		$this->practicalsAmount = $practicalsAmount;
		$this->seminarsAmount = $seminarsAmount;
		$this->labsAmount = $labsAmount;
		$this->educationalForms = $educationalForms;
		$this->isCourseworkExists = $isCourseworkExists;
		$this->isCourseProjectExists = $isCourseProjectExists;
		$this->isCalculationAndGraphicWorkExists = $isCalculationAndGraphicWorkExists;
		$this->isCalculationAndGraphiTaskExists = $isCalculationAndGraphiTaskExists;
		$this->additionalTasks = $additionalTasks;
		$this->colloquiumAmount = $colloquiumAmount;
		$this->controlWorkAmount = $controlWorkAmount;
		$this->semesterNumber = $semesterNumber;
		$this->examTypeId = $examTypeId;
		$this->examTypeName = $examTypeName;
		$this->creditsAmount = $creditsAmount;
		$this->courseTask = $courseTask;
		$this->calculationAndGraphicTypeTask = $calculationAndGraphicTypeTask;
		$this->moduleTask = $moduleTask;
		$this->lectionSelfworkTask = $lectionSelfworkTask;
		$this->labSelfworkTask = $labSelfworkTask;
		$this->practicalSelfworkTask = $practicalSelfworkTask;
		$this->seminarSelfworkTask = $seminarSelfworkTask;
	}
}
