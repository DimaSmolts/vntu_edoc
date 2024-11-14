<?php

namespace App\Models;

class WPInvolvedPersonModel
{
    public int $workingProgramInvolvedPersonsId;
    public int $involvedPersonId;
    public string $involvedPersonRoleId;

    public function __construct(
        $workingProgramInvolvedPersonsId,
        $involvedPersonId,
        $involvedPersonRoleId
    ) {
        $this->workingProgramInvolvedPersonsId = $workingProgramInvolvedPersonsId;
        $this->involvedPersonId = $involvedPersonId;
        $this->involvedPersonRoleId = $involvedPersonRoleId;
    }
}
