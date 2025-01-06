<?php

namespace App\Models;

require_once __DIR__ . '/TaskModel.php';

use App\Models\TaskModel;

class SemesterModel
{
	public int $id;
	public ?int $semesterNumber;
	public ?int $examTypeId;
	public array $modules;
	public array $educationalForms;
	public ?string $pointsDistribution;
	public ?TaskModel $calculationAndGraphicTypeTask;
	public array $additionalTasks;

	public function __construct(
		$id,
		?int $semesterNumber = null,
		?int $examTypeId = null,
		$modules = [],
		$educationalForms = [],
		?string $pointsDistribution = '',
		?TaskModel $calculationAndGraphicTypeTask = null,
		$additionalTasks = [],
	) {
		$this->id = $id;
		$this->semesterNumber = $semesterNumber;
		$this->examTypeId = $examTypeId;
		$this->modules = $modules;
		$this->educationalForms = $educationalForms;
		$this->pointsDistribution = $pointsDistribution;
		$this->calculationAndGraphicTypeTask = $calculationAndGraphicTypeTask;
		$this->additionalTasks = $additionalTasks;
	}
}
