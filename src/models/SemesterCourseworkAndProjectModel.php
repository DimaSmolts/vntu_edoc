<?php

namespace App\Models;

class SemesterCourseworkAndProjectModel
{
    public int $semesterId;
    public bool $isExists;
    public ?int $semesterNumber;
    public ?int $taskTypeId;
    public ?string $taskTypeName;
    public ?string $assessmentComponents;
    public ?int $hours;
    public array $educationalForms;

    public function __construct(
        int $semesterId,
        bool $isExists,
        ?int $semesterNumber = null,
        ?int $taskTypeId = null,
        ?string $taskTypeName = '',
        ?string $assessmentComponents = '',
        ?int $hours = null,
        array $educationalForms = [],
    ) {
        $this->semesterId = $semesterId;
        $this->isExists = $isExists;
        $this->semesterNumber = $semesterNumber;
        $this->taskTypeId = $taskTypeId;
        $this->taskTypeName = $taskTypeName;
        $this->assessmentComponents = $assessmentComponents;
        $this->hours = $hours;
        $this->educationalForms = $educationalForms;
    }
}
