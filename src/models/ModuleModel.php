<?php

namespace App\Models;

class ModuleModel
{
	public int $id;
	public int $educationalDisciplineSemesterId;
	public string $name;
	public int $moduleNumber;

	public function __construct(
		$id,
		$educationalDisciplineSemesterId,
		$name,
		$moduleNumber
	) {
		$this->id = $id;
		$this->educationalDisciplineSemesterId = $educationalDisciplineSemesterId;
		$this->name = $name;
		$this->moduleNumber = $moduleNumber;
	}
}
