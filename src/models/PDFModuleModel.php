<?php

namespace App\Models;

class PDFModuleModel
{
	public int $moduleId;
	public bool $isColloquiumExists;
	public bool $isControlWorkExists;
	public ?string $moduleName;
	public ?int $moduleNumber;
	public array $themes;
	public array $educationalFormHoursStructure = [];

	public function __construct(
		int $moduleId,
		bool $isColloquiumExists,
		bool $isControlWorkExists,
		?string $moduleName = '',
		?int $moduleNumber = null,
		array $themes = [],
		array $educationalFormHoursStructure = [],
	) {
		$this->moduleId = $moduleId;
		$this->isColloquiumExists = $isColloquiumExists;
		$this->isControlWorkExists = $isControlWorkExists;
		$this->moduleName = $moduleName;
		$this->moduleNumber = $moduleNumber;
		$this->themes = $themes;
		$this->educationalFormHoursStructure = $educationalFormHoursStructure;
	}
}
