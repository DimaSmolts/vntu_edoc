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
    public ?string $workPosition;
    public ?string $role;
    public ?string $positionAndMinutesOfMeeting;
    public ?string $degree;

    public function __construct(
        int $id,
        ?int $involvedPersonId = null,
        ?int $involvedPersonRoleId = null,
        ?string $surname = '',
        ?string $name = '',
        ?string $patronymicName = '',
        ?string $workPosition = '',
        ?string $role = '',
        ?string $positionAndMinutesOfMeeting = '',
        ?string $degree = '',
    ) {
        $this->id = $id;
        $this->involvedPersonId = $involvedPersonId;
        $this->involvedPersonRoleId = $involvedPersonRoleId;
        $this->surname = $surname;
        $this->name = $name;
        $this->patronymicName = $patronymicName;
        $this->workPosition = $workPosition;
        $this->role = $role;
        $this->positionAndMinutesOfMeeting = $positionAndMinutesOfMeeting;
        $this->degree = $degree;
    }
}
