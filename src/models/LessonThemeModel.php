<?php

namespace App\Models;

class LessonThemeModel
{
	public int $lessonThemeId;
	public int $lessonTypeId;
	public ?string $lessonThemeName;
	public ?int $lessonThemeNumber;
	public ?int $fullTime;
	public ?int $correspondence;

	public function __construct(
		int $lessonThemeId,
		int $lessonTypeId,
		?string $lessonThemeName = "",
		?int $lessonThemeNumber = null,
		?int $fullTime = null,
		?int $correspondence = null
	) {
		$this->lessonThemeId = $lessonThemeId;
		$this->lessonTypeId = $lessonTypeId;
		$this->lessonThemeName = $lessonThemeName;
		$this->lessonThemeNumber = $lessonThemeNumber;
		$this->fullTime = $fullTime;
		$this->correspondence = $correspondence;
	}
}
