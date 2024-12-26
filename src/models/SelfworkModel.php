<?php

namespace App\Models;

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
	public bool $isAdditionalTasksExist;
	public array $additionalTasks;
	public int $colloquiumAmount;
	public int $controlWorkAmount;
	public ?int $semesterNumber;
	public ?int $examTypeId;
	public ?string $examTypeName;
	public ?int $creditsAmount;

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
		bool $isAdditionalTasksExist,
		array $additionalTasks,
		int $colloquiumAmount,
		int $controlWorkAmount,
		?int $semesterNumber = null,
		?int $examTypeId = null,
		?string $examTypeName = '',
		?int $creditsAmount = null,
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
		$this->isAdditionalTasksExist = $isAdditionalTasksExist;
		$this->additionalTasks = $additionalTasks;
		$this->colloquiumAmount = $colloquiumAmount;
		$this->controlWorkAmount = $controlWorkAmount;
		$this->semesterNumber = $semesterNumber;
		$this->examTypeId = $examTypeId;
		$this->examTypeName = $examTypeName;
		$this->creditsAmount = $creditsAmount;
	}
}
