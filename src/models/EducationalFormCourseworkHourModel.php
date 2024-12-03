<?php

namespace App\Models;

class EducationalFormCourseworkHourModel
{
    public int $id;
    public int $educationalFormId;
    public string $courseworkFormName;
    public ?int $hours;

    public function __construct(
        int $id,
        int $educationalFormId,
        string $courseworkFormName,
        ?int $hours = null,
    ) {
        $this->id = $id;
        $this->educationalFormId = $educationalFormId;
        $this->courseworkFormName = $courseworkFormName;
        $this->hours = $hours;
    }
}
