<?php

namespace App\Models;

class EducationalFormHoursStructureModel
{
	public ?string $educationalFormName;
	public ?int $lectionHours;
	public ?int $practicalHours;
	public ?int $seminarHours;
	public ?int $labHours;
	public ?int $selfworkHours;
	public ?int $totalHours;

	public function __construct(
		?string $educationalFormName = '',
		?int $lectionHours = null,
		?int $practicalHours = null,
		?int $seminarHours = null,
		?int $labHours = null,
		?int $selfworkHours = null,
		?int $totalHours = null
	) {
		$this->educationalFormName = $educationalFormName;
		$this->lectionHours = $lectionHours;
		$this->practicalHours = $practicalHours;
		$this->seminarHours = $seminarHours;
		$this->labHours = $labHours;
		$this->selfworkHours = $selfworkHours;
		$this->totalHours = $totalHours;
	}
}
