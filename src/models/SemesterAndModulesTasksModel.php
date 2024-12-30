<?php

namespace App\Models;

class SemesterAndModulesTasksModel
{
    public int $semesterId;
    public bool $isCourseworkExists;
    public bool $isCourseProjectExists;
    public bool $isCalculationAndGraphicWorkExists;
    public bool $isCalculationAndGraphicTaskExists;
    public ?int $semesterNumber;
    public array $modules;
    public array $educationalForms;

    public function __construct(
        int $semesterId,
        bool $isCourseworkExists,
        bool $isCourseProjectExists,
        bool $isCalculationAndGraphicWorkExists,
        bool $isCalculationAndGraphicTaskExists,
        ?int $semesterNumber = null,
        array $modules = [],
        array $educationalForms = [],
    ) {
        $this->semesterId = $semesterId;
        $this->isCourseworkExists = $isCourseworkExists;
        $this->isCourseProjectExists = $isCourseProjectExists;
        $this->isCalculationAndGraphicWorkExists = $isCalculationAndGraphicWorkExists;
        $this->isCalculationAndGraphicTaskExists = $isCalculationAndGraphicTaskExists;
        $this->semesterNumber = $semesterNumber;
        $this->modules = $modules;
        $this->educationalForms = $educationalForms;
    }
}
