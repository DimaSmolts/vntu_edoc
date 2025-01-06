<?php

namespace App\Models;

class TaskModel
{
    public int $semesterId;
    public int $taskTypeId;
    public int $taskDetailsId;
    public string $taskTypeName;
	public array $educationalFormHours;
	public ?int $points;

    public function __construct(
        int $semesterId,
        int $taskTypeId,
        int $taskDetailsId,
        string $taskTypeName,
        array $educationalFormHours,
        ?int $points,
    ) {
        $this->semesterId = $semesterId;
        $this->taskTypeId = $taskTypeId;
        $this->taskDetailsId = $taskDetailsId;
        $this->taskTypeName = $taskTypeName;
        $this->educationalFormHours = $educationalFormHours;
        $this->points = $points;
    }
}
