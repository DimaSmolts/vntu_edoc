<?php

namespace App\Models;

class SemesterModel
{
	public int $id;
	public ?int $semesterNumber;
	public ?string $examType;
	public array $modules;
	public ?int $courseWork;
	public array $educationalForms;

	public function __construct(
		$id,
		?int $semesterNumber = null,
		?string $examType = '',
		$modules = [],
		?int $courseWork = null,
		$educationalForms = [],
	) {
		$this->id = $id;
		$this->semesterNumber = $semesterNumber;
		$this->examType = $examType;
		$this->modules = $modules;
		$this->courseWork = $courseWork;
		$this->educationalForms = $educationalForms;
	}
}
