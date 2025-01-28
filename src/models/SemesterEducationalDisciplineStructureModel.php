<?php

namespace App\Models;

class SemesterEducationalDisciplineStructureModel
{
	public int $id;
	public ?int $semesterNumber;
	public array $educationalForms;
	public array $lections;
	public array $modules;

	public function __construct(
		$id,
		?int $semesterNumber = null,
		$educationalForms = [],
		$lections = [],
		$modules = [],
	) {
		$this->id = $id;
		$this->semesterNumber = $semesterNumber;
		$this->educationalForms = $educationalForms;
		$this->lections = $lections;
		$this->modules = $modules;
	}
}