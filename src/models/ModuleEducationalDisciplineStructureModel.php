<?php

namespace App\Models;

class ModuleEducationalDisciplineStructureModel
{
	public int $id;
	public ?int $moduleNumber;
	public array $seminars;
	public array $practicals;
	public array $labs;

	public function __construct(
		$id,
		?int $moduleNumber = null,
		$seminars = [],
		$practicals = [],
		$labs = [],
	) {
		$this->id = $id;
		$this->moduleNumber = $moduleNumber;
		$this->seminars = $seminars;
		$this->practicals = $practicals;
		$this->labs = $labs;
	}
}
