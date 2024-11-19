<?php

namespace App\Models;

class LessonThemeModel
{
	public int $lessonThemeId;
	public int $lessonTypeId;
	public ?string $lessonThemeName;
	public ?int $lessonThemeNumber;
	public array $educationalFormHours;

	public function __construct(
		int $lessonThemeId,
		int $lessonTypeId,
		?string $lessonThemeName = "",
		?int $lessonThemeNumber = null,
		array $educationalFormHours = []
	) {
		$this->lessonThemeId = $lessonThemeId;
		$this->lessonTypeId = $lessonTypeId;
		$this->lessonThemeName = $lessonThemeName;
		$this->lessonThemeNumber = $lessonThemeNumber;
		$this->educationalFormHours = $educationalFormHours;
	}
}
