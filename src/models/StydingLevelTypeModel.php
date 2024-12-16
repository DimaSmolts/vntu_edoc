<?php

namespace App\Models;

class StydingLevelTypeModel
{
    public int $id;
    public string $name;

    public function __construct(
        $id,
        $name
    ) {
        $this->id = $id;
        $this->name = $name;
    }
}
