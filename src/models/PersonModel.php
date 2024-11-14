<?php

namespace App\Models;

class PersonModel
{
    public int $id;
    public string $surname;
    public string $name;
    public string $patronymicName;
    public string $degree;

    public function __construct(
        $id,
        $surname,
        $name,
        $patronymicName,
        $degree
    ) {
        $this->id = $id;
        $this->surname = $surname;
        $this->name = $name;
        $this->patronymicName = $patronymicName;
        $this->degree = $degree;
    }
}
