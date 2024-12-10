<?php

namespace App\Models;

class WPInvolvedPersonModel
{
    public int $id;
    public ?int $involvedPersonId;
    public ?int $involvedPersonRoleId;
    public ?string $name;
    public ?string $degree;
    public ?string $role;
    public ?string $positionAndMinutesOfMeeting;

    public function __construct(
        int $id,
        ?int $involvedPersonId = null,
        ?int $involvedPersonRoleId = null,
        ?string $name = '',
        ?string $degree = '',
        ?string $role = '',
        ?string $positionAndMinutesOfMeeting = ''
    ) {
        $this->id = $id;
        $this->involvedPersonId = $involvedPersonId;
        $this->involvedPersonRoleId = $involvedPersonRoleId;
        $this->name = $name;
        $this->degree = $degree;
        $this->role = $role;
        $this->positionAndMinutesOfMeeting = $positionAndMinutesOfMeeting;
    }
}
