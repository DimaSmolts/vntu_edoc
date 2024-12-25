<?php

namespace App\Models;

class SemesterCourseworkAndProjectModel
{
    public int $semesterId;
    public bool $isCourseworkExists;
    public bool $isCourseProjectExists;
    public ?int $semesterNumber;
    public ?string $courseworkAssessmentComponents;
    public ?string $courseProjectAssessmentComponents;
    public array $educationalForms;

    public function __construct(
        int $semesterId,
        bool $isCourseworkExists,
        bool $isCourseProjectExists,
        ?int $semesterNumber = null,
        ?string $courseworkAssessmentComponents = '',
        ?string $courseProjectAssessmentComponents = '',
        array $educationalForms = [],
    ) {
        $this->semesterId = $semesterId;
        $this->isCourseworkExists = $isCourseworkExists;
        $this->isCourseProjectExists = $isCourseProjectExists;
        $this->semesterNumber = $semesterNumber;
        $this->courseworkAssessmentComponents = $courseworkAssessmentComponents;
        $this->courseProjectAssessmentComponents = $courseProjectAssessmentComponents;
        $this->educationalForms = $educationalForms;
    }
}
