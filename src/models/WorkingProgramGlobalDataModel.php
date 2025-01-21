<?php

namespace App\Models;

class WorkingProgramGlobalDataModel
{
	public ?string $universityName;
	public ?string $universityShortName;
	public ?string $academicRightsAndResponsibilities;

	public function __construct(
		?string $universityName = "",
		?string $universityShortName = "",
		?string $academicRightsAndResponsibilities = "",
	) {
		$this->universityName = $universityName;
		$this->universityShortName = $universityShortName;
		$this->academicRightsAndResponsibilities = $academicRightsAndResponsibilities;
	}
}
