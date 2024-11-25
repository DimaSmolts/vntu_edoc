<?php

namespace App\Models;

class EducationalFormLessonHourModel
{
    public int $id;
    public int $educationalFormId;
    public int $lessonId;
    public string $lessonFormName;
    public ?int $hours;

    public function __construct(
        int $id,
        int $educationalFormId,
        int $lessonId,
        string $lessonFormName,
        ?int $hours = null
    ) {
        $this->id = $id;
        $this->educationalFormId = $educationalFormId;
        $this->lessonId = $lessonId;
        $this->lessonFormName = $lessonFormName;
        $this->hours = $hours;
    }
}
