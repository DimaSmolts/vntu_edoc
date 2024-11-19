<?php

namespace App\Models;

class EducationalFormModel
{
    public int $id;
    public string $colName;
    public string $name;

    public function __construct(
        $id,
        $colName,
        $name
    ) {
        $this->id = $id;
        $this->colName = $colName;
        $this->name = $name;
    }
}
