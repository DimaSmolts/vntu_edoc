<?php

namespace App\Models;

class EducationalFormTaskHourModel
{
    public int $id;
    public string $educationalFormName;
    public ?int $hours;

    public function __construct(
        int $id,
        string $educationalFormName,
        ?int $hours = null,
    ) {
        $this->id = $id;
        $this->educationalFormName = $educationalFormName;
        $this->hours = $hours;
    }
}
