<?php

namespace App\Models;

class ModuleModel
{
	public int $moduleId;
	public ?string $moduleName;
	public ?int $moduleNumber;
    public array $themes;

	public function __construct(
		int $moduleId,
		?string $moduleName = '',
		?int $moduleNumber = null,
		array $themes = []
	) {
		$this->moduleId = $moduleId;
		$this->moduleName = $moduleName;
		$this->moduleNumber = $moduleNumber;
		$this->themes = $themes;
	}
}
