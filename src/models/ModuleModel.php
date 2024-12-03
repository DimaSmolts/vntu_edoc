<?php

namespace App\Models;

class ModuleModel
{
	public int $moduleId;
	public ?string $moduleName;
	public ?int $moduleNumber;
	public bool $isColloquiumExists;
	public ?int $colloquiumPoints;
    public array $themes;

	public function __construct(
		int $moduleId,
		?string $moduleName = '',
		?int $moduleNumber = null,
		bool $isColloquiumExists,
		?int $colloquiumPoints = null,
		array $themes = []
	) {
		$this->moduleId = $moduleId;
		$this->moduleName = $moduleName;
		$this->moduleNumber = $moduleNumber;
		$this->isColloquiumExists = $isColloquiumExists;
		$this->colloquiumPoints = $colloquiumPoints;
		$this->themes = $themes;
	}
}
