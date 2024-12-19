<?php

namespace App\Models;

class SpecialtyModel
{
    public int $id;
    public int $code;
    public string $name;

    public function __construct(
        $id,
        $code,
        $name,
    ) {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
    }
}
