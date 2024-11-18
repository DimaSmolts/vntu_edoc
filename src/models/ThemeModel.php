<?php

namespace App\Models;

class ThemeModel
{
	public int $themeId;
	public ?string $name;
	public ?string $description;
	public ?int $themeNumber;

	public function __construct(
		$themeId,
		?string $name = '',
		?string $description = '',
		?int $themeNumber = null
	) {
		$this->themeId = $themeId;
		$this->name = $name;
		$this->description = $description;
		$this->themeNumber = $themeNumber;
	}
}
