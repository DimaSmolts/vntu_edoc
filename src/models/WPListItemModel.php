<?php

namespace App\Models;

class WPListItemModel
{
    public int $id;
    public string $disciplineName;
    public string $createdAt;
    public array $specialtiesCodesAndNames;
    public ?string $semesterNumbers;

    public function __construct(
        string $id,
        string $disciplineName,
        string $createdAt,
        array $specialtiesCodesAndNames = [],
        ?string $semesterNumbers = ''
    ) {
        $this->id = $id;
        $this->disciplineName = $disciplineName;
        $this->createdAt = $createdAt;
        $this->specialtiesCodesAndNames = $specialtiesCodesAndNames;
        $this->semesterNumbers = $semesterNumbers;
    }
}
