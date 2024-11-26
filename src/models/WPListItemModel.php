<?php

namespace App\Models;

class WPListItemModel
{
    public int $id;
    public string $disciplineName;
    public string $createdAt;
    public ?string $specialtyName;
    public ?int $academicYear;

    public function __construct(
        string $id,
        string $disciplineName,
        string $createdAt,
        ?string $specialtyName = "",
        ?int $academicYear = null
    ) {
        $this->id = $id;
        $this->disciplineName = $disciplineName;
        $this->createdAt = $createdAt;
        $this->specialtyName = $specialtyName;
        $this->academicYear = $academicYear;
    }
}
