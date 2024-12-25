<?php

namespace App\Models;

class SemesterModel
{
	public int $id;
	public bool $isCourseworkExists;
	public bool $isCourseProjectExists;
	public bool $isCalculationAndGraphicWorkExists;
	public bool $isCalculationAndGraphicTaskExists;
	public ?string $additionalTasks;
	public ?int $semesterNumber;
	public ?int $examTypeId;
	public array $modules;
	public array $educationalForms;

	public function __construct(
		$id,
		$isCourseworkExists,
		$isCourseProjectExists,
		$isCalculationAndGraphicWorkExists,
		$isCalculationAndGraphicTaskExists,
		?string $additionalTasks,
		?int $semesterNumber = null,
		?int $examTypeId = null,
		$modules = [],
		$educationalForms = [],
	) {
		$this->id = $id;
		$this->isCourseworkExists = $isCourseworkExists;
		$this->isCourseProjectExists = $isCourseProjectExists;
		$this->isCalculationAndGraphicWorkExists = $isCalculationAndGraphicWorkExists;
		$this->isCalculationAndGraphicTaskExists = $isCalculationAndGraphicTaskExists;
		$this->additionalTasks = $additionalTasks;
		$this->semesterNumber = $semesterNumber;
		$this->examTypeId = $examTypeId;
		$this->modules = $modules;
		$this->educationalForms = $educationalForms;
	}
}
