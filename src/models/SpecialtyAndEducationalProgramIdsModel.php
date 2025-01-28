<?php

namespace App\Models;

class SpecialtyAndEducationalProgramIdsModel
{
    public ?int $specialtyId;
    public array $educationalProgramsIds;

    public function __construct(
        $specialtyId = null,
        $educationalProgramsIds
    ) {
        $this->specialtyId = $specialtyId;
        $this->educationalProgramsIds = $educationalProgramsIds;
    }
}
