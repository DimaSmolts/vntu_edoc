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
	public ?string $prerequisites;
	public ?string $goal;
	public ?string $tasks;
	public ?string $competences;
	public ?string $programResults;
	public ?string $controlMeasures;
	public ?string $studingMethods;
	public ?string $examingMethods;
	public ?string $code;
	public ?int $modulesInWorkingProgramAmount;
	public array $semesters;
	public array $createdByPersons;
	public array $availableEducationalForms;
	public array $totalHoursForLections;
	public array $totalHoursForPracticals;
	public array $totalHoursForSeminars;
	public array $totalHoursForLabs;
	public array $totalHoursForSelfworks;

	public function __construct(
		int $id,
		?int $regularYear = null,
		?int $academicYear = null,
		?string $facultyName = "",
		?string $departmentName = "",
		?string $disciplineName = "",
		?string $degreeName = "",
		?string $fielfOfStudyIdx = "",
		?string $fielfOfStudyName = "",
		?string $specialtyIdx = "",
		?string $specialtyName = "",
		?string $educationalProgram = "",
		?string $notes = "",
		?string $prerequisites = "",
		?string $goal = "",
		?string $tasks = "",
		?string $competences = "",
		?string $programResults = "",
		?string $controlMeasures = "",
		?string $studingMethods = "",
		?string $examingMethods = "",
		?string $code = "",
		?int $modulesInWorkingProgramAmount = 0,
		array $semesters = [],
		array $createdByPersons = [],
		array $availableEducationalForms = [],
		array $totalHoursForLections = [],
		array $totalHoursForPracticals = [],
		array $totalHoursForSeminars = [],
		array $totalHoursForLabs = [],
		array $totalHoursForSelfworks = [],
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
		$this->prerequisites = $prerequisites;
		$this->goal = $goal;
		$this->tasks = $tasks;
		$this->competences = $competences;
		$this->programResults = $programResults;
		$this->controlMeasures = $controlMeasures;
		$this->studingMethods = $studingMethods;
		$this->examingMethods = $examingMethods;
		$this->code = $code;
		$this->modulesInWorkingProgramAmount = $modulesInWorkingProgramAmount;
		$this->semesters = $semesters;
		$this->createdByPersons = $createdByPersons;
		$this->availableEducationalForms = $availableEducationalForms;
		$this->totalHoursForLections = $totalHoursForLections;
		$this->totalHoursForPracticals = $totalHoursForPracticals;
		$this->totalHoursForSeminars = $totalHoursForSeminars;
		$this->totalHoursForLabs = $totalHoursForLabs;
		$this->totalHoursForSelfworks = $totalHoursForSelfworks;
	}
}
