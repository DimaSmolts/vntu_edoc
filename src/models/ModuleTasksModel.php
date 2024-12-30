<?php

namespace App\Models;

class ModuleTasksModel
{
    public int $moduleId;
    public bool $isColloquiumExists;
    public bool $isControlWorkExists;
    public ?int $moduleNumber;

    public function __construct(
        int $moduleId,
        bool $isColloquiumExists,
        bool $isControlWorkExists,
        ?int $moduleNumber,
    ) {
        $this->moduleId = $moduleId;
        $this->isColloquiumExists = $isColloquiumExists;
        $this->isControlWorkExists = $isControlWorkExists;
        $this->moduleNumber = $moduleNumber;
    }
}
