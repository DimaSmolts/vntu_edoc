<?php

namespace App\Models;

class SemesterModel
{
	public int $id;
	public ?int $semesterNumber;
	public ?int $examTypeId;
	public array $modules;
	public array $educationalForms;

	public function __construct(
		$id,
		?int $semesterNumber = null,
		?int $examTypeId = null,
		$modules = [],
		$educationalForms = [],
	) {
		$this->id = $id;
		$this->semesterNumber = $semesterNumber;
		$this->examTypeId = $examTypeId;
		$this->modules = $modules;
		$this->educationalForms = $educationalForms;
	}
}
