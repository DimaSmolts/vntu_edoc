<?php

namespace App\Models;

class SemesterModel
{
	public int $id;
	public bool $isCourseworkExists;
	public ?int $semesterNumber;
	public ?string $examType;
	public array $modules;
	public array $educationalForms;
	public array $courseworkHours;

	public function __construct(
		$id,
		$isCourseworkExists,
		?int $semesterNumber = null,
		?string $examType = '',
		$modules = [],
		$educationalForms = [],
		$courseworkHours = [],
	) {
		$this->id = $id;
		$this->isCourseworkExists = $isCourseworkExists;
		$this->semesterNumber = $semesterNumber;
		$this->examType = $examType;
		$this->modules = $modules;
		$this->educationalForms = $educationalForms;
		$this->courseworkHours = $courseworkHours;
	}
}
