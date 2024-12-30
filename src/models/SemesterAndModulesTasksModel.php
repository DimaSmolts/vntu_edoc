<?php

namespace App\Models;

class SemesterAndModulesTasksModel
{
    public int $semesterId;
    public bool $isCourseworkExists;
    public bool $isCourseProjectExists;
    public bool $isCalculationAndGraphicWorkExists;
    public bool $isCalculationAndGraphicTaskExists;
    public array $additionalTaskIds;
    public ?int $semesterNumber;
    public array $modules;
    public array $educationalForms;

    public function __construct(
        int $semesterId,
        bool $isCourseworkExists,
        bool $isCourseProjectExists,
        bool $isCalculationAndGraphicWorkExists,
        bool $isCalculationAndGraphicTaskExists,
        array $additionalTaskIds = [],
        ?int $semesterNumber = null,
        array $modules = [],
        array $educationalForms = [],
    ) {
        $this->semesterId = $semesterId;
        $this->isCourseworkExists = $isCourseworkExists;
        $this->isCourseProjectExists = $isCourseProjectExists;
        $this->isCalculationAndGraphicWorkExists = $isCalculationAndGraphicWorkExists;
        $this->isCalculationAndGraphicTaskExists = $isCalculationAndGraphicTaskExists;
        $this->additionalTaskIds = $additionalTaskIds;
        $this->semesterNumber = $semesterNumber;
        $this->modules = $modules;
        $this->educationalForms = $educationalForms;
    }
}
