<?php

namespace App\Models;

class WPListItemModel
{
    public int $id;
    public string $disciplineName;
    public string $createdAt;
    public array $specialtiesNames;
    public ?int $academicYear;

    public function __construct(
        string $id,
        string $disciplineName,
        string $createdAt,
        array $specialtiesNames = [],
        ?int $academicYear = null
    ) {
        $this->id = $id;
        $this->disciplineName = $disciplineName;
        $this->createdAt = $createdAt;
        $this->specialtiesNames = $specialtiesNames;
        $this->academicYear = $academicYear;
    }
}
