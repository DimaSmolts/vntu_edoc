<?php

namespace App\Models;

class SemesterModel
{
	public int $id;
	public int $educationalDisciplineWPId;
	public ?int $semesterNumber;
	public ?int $courseWork;
	public ?string $examType;

	public function __construct(
		$id,
		$educationalDisciplineWPId,
		?int $semesterNumber = null,
		?int $courseWork = null,
		?string $examType = null
	) {
		$this->id = $id;
		$this->educationalDisciplineWPId = $educationalDisciplineWPId;
		$this->semesterNumber = $semesterNumber;
		$this->examType = $examType;
		$this->courseWork = $courseWork;
	}
}
