<?php

namespace App\Models;

class WPListItemModel
{
    public int $id;
    public string $disciplineName;
    public string $createdAt;
    public array $specialtiesWithEducationalPrograms;
    public ?string $semesterNumbers;

    public function __construct(
        string $id,
        string $disciplineName,
        string $createdAt,
        array $specialtiesWithEducationalPrograms = [],
        ?string $semesterNumbers = ''
    ) {
        $this->id = $id;
        $this->disciplineName = $disciplineName;
        $this->createdAt = $createdAt;
        $this->specialtiesWithEducationalPrograms = $specialtiesWithEducationalPrograms;
        $this->semesterNumbers = $semesterNumbers;
    }
}
