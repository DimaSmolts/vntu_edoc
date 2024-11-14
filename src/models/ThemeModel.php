<?php

namespace App\Models;

class ThemeModel
{
	public int $id;
	public int $moduleId;
	public ?string $name;
	public ?string $description;
	public ?int $themeNumber;

	public function __construct(
		$id,
		$moduleId,
		?string $name = null,
		?string $description = null,
		?int $themeNumber = null
	) {
		$this->id = $id;
		$this->moduleId = $moduleId;
		$this->name = $name;
		$this->description = $description;
		$this->themeNumber = $themeNumber;
	}
}
