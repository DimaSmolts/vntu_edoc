<?php

namespace App\Models;

class SemesterEducationalFormModel
{
    public int $id;
    public int $educationalDisciplineSemesterId;
    public int $educationalFormId;
    public string $colName;
    public string $name;

    public function __construct(
        $id,
        $educationalDisciplineSemesterId,
        $educationalFormId,
        $colName,
        $name
    ) {
        $this->id = $id;
        $this->educationalDisciplineSemesterId = $educationalDisciplineSemesterId;
        $this->educationalFormId = $educationalFormId;
        $this->colName = $colName;
        $this->name = $name;
    }
}
