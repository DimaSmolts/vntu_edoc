<?php

namespace App\Models;

class SemesterEducationalDisciplineStructureModel
{
	public int $id;
	public ?int $semesterNumber;
	public array $educationalForms;
	public array $lections;
	public array $seminars;
	public array $practicals;
	public array $labs;

	public function __construct(
		$id,
		?int $semesterNumber = null,
		$educationalForms = [],
		$lections = [],
		$seminars = [],
		$practicals = [],
		$labs = [],
	) {
		$this->id = $id;
		$this->semesterNumber = $semesterNumber;
		$this->educationalForms = $educationalForms;
		$this->lections = $lections;
		$this->seminars = $seminars;
		$this->practicals = $practicals;
		$this->labs = $labs;
	}
}