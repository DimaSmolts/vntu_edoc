<?php

namespace App\Models;

class PDFSemesterModel
{
	public int $id;
	public bool $isCourseworkExists;
	public bool $isCourseProjectExists;
	public bool $isCalculationAndGraphicWorkExists;
	public bool $isCalculationAndGraphicTaskExists;
	public ?string $additionalTasks;
	public ?string $courseworkAssessmentComponents;
	public ?string $courseProjectAssessmentComponents;
	public ?int $semesterNumber;
	public ?int $examTypeId;
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
	public array $educationalFormHoursStructure;

	public function __construct(
		$id,
		$isCourseworkExists,
		$isCourseProjectExists,
		$isCalculationAndGraphicWorkExists,
		$isCalculationAndGraphicTaskExists,
		?string $additionalTasks,
		?string $courseworkAssessmentComponents = '',
		?string $courseProjectAssessmentComponents = '',
		?int $semesterNumber = null,
		?int $examTypeId = null,
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
		array $educationalFormHoursStructure = []
	) {
		$this->id = $id;
		$this->isCourseworkExists = $isCourseworkExists;
		$this->isCourseProjectExists = $isCourseProjectExists;
		$this->isCalculationAndGraphicWorkExists = $isCalculationAndGraphicWorkExists;
		$this->isCalculationAndGraphicTaskExists = $isCalculationAndGraphicTaskExists;
		$this->additionalTasks = $additionalTasks;
		$this->courseworkAssessmentComponents = $courseworkAssessmentComponents;
		$this->courseProjectAssessmentComponents = $courseProjectAssessmentComponents;
		$this->semesterNumber = $semesterNumber;
		$this->examTypeId = $examTypeId;
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
		$this->educationalFormHoursStructure = $educationalFormHoursStructure;
	}
}
