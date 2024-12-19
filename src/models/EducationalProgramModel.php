<?php

namespace App\Models;

class EducationalProgramModel
{
    public int $id;
    public string $name;

    public function __construct(
        $id,
        $name,
    ) {
        $this->id = $id;
        $this->name = $name;
    }
}
