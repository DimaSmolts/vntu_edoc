<?php

namespace App\Models;

class WPInvolvedPersonModel
{
    public int $id;
    public ?int $involvedPersonId;
    public ?int $involvedPersonRoleId;
    public ?string $surname;
    public ?string $name;
    public ?string $patronymicName;
    public ?string $degree;
    public ?string $role;

    public function __construct(
        int $id,
        ?int $involvedPersonId = null,
        ?int $involvedPersonRoleId = null,
        ?string $surname = '',
        ?string $name = '',
        ?string $patronymicName = '',
        ?string $degree = '',
        ?string $role = ''
    ) {
        $this->id = $id;
        $this->involvedPersonId = $involvedPersonId;
        $this->involvedPersonRoleId = $involvedPersonRoleId;
        $this->surname = $surname;
        $this->name = $name;
        $this->patronymicName = $patronymicName;
        $this->degree = $degree;
        $this->role = $role;
    }
}
