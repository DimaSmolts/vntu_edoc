<?php

namespace App\Models;

class SemesterCourseworkModel
{
    public int $semesterId;
    public bool $isCourseworkExists;
    public ?int $semesterNumber;
    public ?string $courseworkAssessmentComponents;
    public array $courseworkHours;
    public array $educationalForms;

    public function __construct(
        int $semesterId,
        bool $isCourseworkExists,
        ?int $semesterNumber = null,
        ?string $courseworkAssessmentComponents = '',
        array $courseworkHours = [],
        array $educationalForms = [],
    ) {
        $this->semesterId = $semesterId;
        $this->isCourseworkExists = $isCourseworkExists;
        $this->semesterNumber = $semesterNumber;
        $this->courseworkAssessmentComponents = $courseworkAssessmentComponents;
        $this->courseworkHours = $courseworkHours;
        $this->educationalForms = $educationalForms;
    }
}
