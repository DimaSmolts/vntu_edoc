<?php

namespace App\Models;

class PDFSemesterModel
{
	public int $id;
	public ?int $semesterNumber;
	public ?string $examType;
	public array $modules;
	public ?int $courseWork;
	public array $educationalForms;
	public array $practicals;

	public function __construct(
		$id,
		?int $semesterNumber = null,
		?string $examType = '',
		$modules = [],
		?int $courseWork = null,
		$educationalForms = [],
		$practicals = [],
	) {
		$this->id = $id;
		$this->semesterNumber = $semesterNumber;
		$this->examType = $examType;
		$this->modules = $modules;
		$this->courseWork = $courseWork;
		$this->educationalForms = $educationalForms;
		$this->practicals = $practicals;
	}
}
