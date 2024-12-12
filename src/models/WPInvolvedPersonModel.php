<?php

namespace App\Models;

class WPInvolvedPersonModel
{
    public int $id;
    public ?int $involvedPersonId;
    public ?int $involvedPersonRoleId;
    public ?string $name;
    public ?string $workPosition;
    public ?string $role;
    public ?string $positionAndMinutesOfMeeting;
    public ?string $degree;

    public function __construct(
        int $id,
        ?int $involvedPersonId = null,
        ?int $involvedPersonRoleId = null,
        ?string $name = '',
        ?string $workPosition = '',
        ?string $role = '',
        ?string $positionAndMinutesOfMeeting = '',
        ?string $degree = '',
    ) {
        $this->id = $id;
        $this->involvedPersonId = $involvedPersonId;
        $this->involvedPersonRoleId = $involvedPersonRoleId;
        $this->name = $name;
        $this->workPosition = $workPosition;
        $this->role = $role;
        $this->positionAndMinutesOfMeeting = $positionAndMinutesOfMeeting;
        $this->degree = $degree;
    }
}
