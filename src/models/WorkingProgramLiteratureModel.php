<?php

namespace App\Models;

class WorkingProgramLiteratureModel
{
	public ?string $main;
	public ?string $supporting;
	public ?string $additional;
	public ?string $informationResources;

	public function __construct(
		?string $main = "",
		?string $supporting = "",
		?string $additional = "",
		?string $informationResources = "",
	) {
		$this->main = $main;
		$this->supporting = $supporting;
		$this->additional = $additional;
		$this->informationResources = $informationResources;
	}
}
