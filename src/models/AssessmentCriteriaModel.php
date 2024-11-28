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

	public function __construct(
		?string $A = "",
		?string $B = "",
		?string $C = "",
		?string $D = "",
		?string $E = "",
		?string $FX = "",
		?string $F = "",
		?string $FXAndF = "",
	) {
		$this->A = $A;
		$this->B = $B;
		$this->C = $C;
		$this->D = $D;
		$this->E = $E;
		$this->FX = $FX;
		$this->F = $F;
		$this->FXAndF = $FXAndF;
	}
}
