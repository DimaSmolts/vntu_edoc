<?php

namespace App\Models;

class PersonModel
{
    public int $id;
    public string $surname;
    public string $name;
    public string $patronymicName;

    public function __construct(
        $id,
        $surname,
        $name,
        $patronymicName,
    ) {
        $this->id = $id;
        $this->surname = $surname;
        $this->name = $name;
        $this->patronymicName = $patronymicName;
    }
}
