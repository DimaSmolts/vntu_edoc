<?php

namespace App\Models;

class WPDetailsModel
{
	public int $id;
	public ?int $regularYear;
	public ?int $academicYear;
	public ?string $facultyName;
	public ?string $departmentName;
	public ?string $disciplineName;
	public ?string $degreeName;
	public ?string $fielfOfStudyIdx;
	public ?string $fielfOfStudyName;
	public ?string $specialtyIdx;
	public ?string $specialtyName;
	public ?string $educationalProgram;
	public ?string $notes;
	public ?string $language;
	public ?string $prerequisites;
	public ?string $goal;
	public ?string $tasks;
	public ?string $competences;
	public ?string $programResults;
	public ?string $controlMeasures;

	public function __construct(
		int $id,
		?int $regularYear = null,
		?int $academicYear = null,
		?string $facultyName = null,
		?string $departmentName = null,
		?string $disciplineName = null,
		?string $degreeName = null,
		?string $fielfOfStudyIdx = null,
		?string $fielfOfStudyName = null,
		?string $specialtyIdx = null,
		?string $specialtyName = null,
		?string $educationalProgram = null,
		?string $notes = null,
		?string $language = null,
		?string $prerequisites = null,
		?string $goal = null,
		?string $tasks = null,
		?string $competences = null,
		?string $programResults = null,
		?string $controlMeasures = null
	) {
		$this->id = $id;
		$this->regularYear = $regularYear;
		$this->academicYear = $academicYear;
		$this->facultyName = $facultyName;
		$this->departmentName = $departmentName;
		$this->disciplineName = $disciplineName;
		$this->degreeName = $degreeName;
		$this->fielfOfStudyIdx = $fielfOfStudyIdx;
		$this->fielfOfStudyName = $fielfOfStudyName;
		$this->specialtyIdx = $specialtyIdx;
		$this->specialtyName = $specialtyName;
		$this->educationalProgram = $educationalProgram;
		$this->notes = $notes;
		$this->language = $language;
		$this->prerequisites = $prerequisites;
		$this->goal = $goal;
		$this->tasks = $tasks;
		$this->competences = $competences;
		$this->programResults = $programResults;
		$this->controlMeasures = $controlMeasures;
	}
}
