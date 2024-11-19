<?php

namespace App\Models;

class EducationalFormLessonHourModel
{
    public int $id;
    public int $educationalFormId;
    public int $lessonThemeId;
    public string $lessonFormName;
    public ?int $hours;

    public function __construct(
        int $id,
        int $educationalFormId,
        int $lessonThemeId,
        string $lessonFormName,
        ?int $hours = null
    ) {
        $this->id = $id;
        $this->educationalFormId = $educationalFormId;
        $this->lessonThemeId = $lessonThemeId;
        $this->lessonFormName = $lessonFormName;
        $this->hours = $hours;
    }
}
