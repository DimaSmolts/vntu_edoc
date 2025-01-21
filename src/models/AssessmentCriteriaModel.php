<?php

namespace App\Models;

class AssessmentCriteriaModel
{
	public ?string $A;
	public ?string $B;
	public ?string $C;
	public ?string $D;
	public ?string $E;
	public ?string $FX;
	public ?string $F;
	public ?string $FXAndF;
	public ?string $taskName;
	public ?int $lessonTypeId;
	public ?int $taskTypeId;

	public function __construct(
		?string $A = "",
		?string $B = "",
		?string $C = "",
		?string $D = "",
		?string $E = "",
		?string $FX = "",
		?string $F = "",
		?string $FXAndF = "",
		?string $taskName = "",
		?int $lessonTypeId = null,
		?int $taskTypeId = null
	) {
		$this->A = $A;
		$this->B = $B;
		$this->C = $C;
		$this->D = $D;
		$this->E = $E;
		$this->FX = $FX;
		$this->F = $F;
		$this->FXAndF = $FXAndF;
		$this->taskName = $taskName;
		$this->lessonTypeId = $lessonTypeId;
		$this->taskTypeId = $taskTypeId;
	}
}
