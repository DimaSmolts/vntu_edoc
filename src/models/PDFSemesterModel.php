<?php

namespace App\Models;

class PDFSemesterModel
{
	public int $id;
	public bool $isCourseworkExists;
	public bool $isCourseProjectExists;
	public ?string $courseTaskAssessmentComponents;
	public ?int $semesterNumber;
	public ?int $examTypeId;
	public ?string $examTypeName;
	public array $modules;
	public array $educationalForms;
	public array $lections;
	public array $practicals;
	public array $seminars;
	public array $labs;
	public array $totalHoursForLections;
	public array $totalHoursForPracticals;
	public array $totalHoursForSeminars;
	public array $totalHoursForLabs;
	public array $totalHoursForSelfworks;
	public array $educationalFormHoursStructure;

	public function __construct(
		$id,
		$isCourseworkExists,
		$isCourseProjectExists,
		?string $courseTaskAssessmentComponents = '',
		?int $semesterNumber = null,
		?int $examTypeId = null,
		?string $examTypeName = null,
		$modules = [],
		$educationalForms = [],
		array $lections = [],
		array $practicals = [],
		array $seminars = [],
		array $labs = [],
		array $totalHoursForLections = [],
		array $totalHoursForPracticals = [],
		array $totalHoursForSeminars = [],
		array $totalHoursForLabs = [],
		array $totalHoursForSelfworks = [],
		array $educationalFormHoursStructure = []
	) {
		$this->id = $id;
		$this->isCourseworkExists = $isCourseworkExists;
		$this->isCourseProjectExists = $isCourseProjectExists;
		$this->courseTaskAssessmentComponents = $courseTaskAssessmentComponents;
		$this->semesterNumber = $semesterNumber;
		$this->examTypeId = $examTypeId;
		$this->examTypeName = $examTypeName;
		$this->modules = $modules;
		$this->educationalForms = $educationalForms;
		$this->lections = $lections;
		$this->practicals = $practicals;
		$this->seminars = $seminars;
		$this->labs = $labs;
		$this->totalHoursForLections = $totalHoursForLections;
		$this->totalHoursForPracticals = $totalHoursForPracticals;
		$this->totalHoursForSeminars = $totalHoursForSeminars;
		$this->totalHoursForLabs = $totalHoursForLabs;
		$this->totalHoursForSelfworks = $totalHoursForSelfworks;
		$this->educationalFormHoursStructure = $educationalFormHoursStructure;
	}
}
