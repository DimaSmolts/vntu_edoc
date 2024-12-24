<?php

namespace App\Models;

class SemesterModel
{
	public int $id;
	public bool $isCourseworkExists;
	public ?int $semesterNumber;
	public ?int $examTypeId;
	public array $modules;
	public array $educationalForms;
	public array $courseworkHours;

	public function __construct(
		$id,
		$isCourseworkExists,
		?int $semesterNumber = null,
		?int $examTypeId = null,
		$modules = [],
		$educationalForms = [],
		$courseworkHours = [],
	) {
		$this->id = $id;
		$this->isCourseworkExists = $isCourseworkExists;
		$this->semesterNumber = $semesterNumber;
		$this->examTypeId = $examTypeId;
		$this->modules = $modules;
		$this->educationalForms = $educationalForms;
		$this->courseworkHours = $courseworkHours;
	}
}
