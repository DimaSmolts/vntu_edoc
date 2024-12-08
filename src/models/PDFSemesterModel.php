<?php

namespace App\Models;

class PDFSemesterModel
{
	public int $id;
	public bool $isCourseworkExists;
	public ?string $courseworkAssessmentComponents;
	public ?int $semesterNumber;
	public ?string $examType;
	public array $modules;
	public array $educationalForms;
	public array $lections;
	public array $practicals;
	public array $seminars;
	public array $labs;
	public array $selfworks;
	public array $totalHoursForLections;
	public array $totalHoursForPracticals;
	public array $totalHoursForSeminars;
	public array $totalHoursForLabs;
	public array $totalHoursForSelfworks;
	public array $educationalFormHoursStructure;
	public array $courseworkHours;

	public function __construct(
		$id,
		$isCourseworkExists,
		?string $courseworkAssessmentComponents = '',
		?int $semesterNumber = null,
		?string $examType = '',
		$modules = [],
		$educationalForms = [],
		array $lections = [],
		array $practicals = [],
		array $seminars = [],
		array $labs = [],
		array $selfworks = [],
		array $totalHoursForLections = [],
		array $totalHoursForPracticals = [],
		array $totalHoursForSeminars = [],
		array $totalHoursForLabs = [],
		array $totalHoursForSelfworks = [],
		array $educationalFormHoursStructure = [],
		$courseworkHours = [],
	) {
		$this->id = $id;
		$this->isCourseworkExists = $isCourseworkExists;
		$this->courseworkAssessmentComponents = $courseworkAssessmentComponents;
		$this->semesterNumber = $semesterNumber;
		$this->examType = $examType;
		$this->modules = $modules;
		$this->educationalForms = $educationalForms;
		$this->lections = $lections;
		$this->practicals = $practicals;
		$this->seminars = $seminars;
		$this->labs = $labs;
		$this->selfworks = $selfworks;
		$this->totalHoursForLections = $totalHoursForLections;
		$this->totalHoursForPracticals = $totalHoursForPracticals;
		$this->totalHoursForSeminars = $totalHoursForSeminars;
		$this->totalHoursForLabs = $totalHoursForLabs;
		$this->totalHoursForSelfworks = $totalHoursForSelfworks;
		$this->educationalFormHoursStructure = $educationalFormHoursStructure;
		$this->courseworkHours = $courseworkHours;
	}
}
